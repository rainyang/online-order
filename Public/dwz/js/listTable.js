var listTable = new Object;
listTable.edit = function(obj, act, id){
  listTable.url = act;
  var tag = obj.firstChild.tagName;

  if (typeof(tag) != "undefined" && tag.toLowerCase() == "input"){
    return;
  }
  /* 保存原始的内容 */
  var org = obj.innerHTML;
  var val = $(obj).html();//Browser.isIE ? obj.innerText : obj.textContent;

  /* 创建一个输入框 */
  var txt = document.createElement("INPUT");
  txt.value = (val == 'N/A') ? '' : val;
  txt.style.width = (obj.offsetWidth + 12) + "px" ;

  /* 隐藏对象中的内容，并将输入框加入到对象中 */
  obj.innerHTML = "";
  obj.appendChild(txt);
  txt.select();

  /* 编辑区输入事件处理函数 */
  /*txt.onkeypress = function(e)
  {
    var evt = Utils.fixEvent(e);
    var obj = Utils.srcElement(e);
	
    if (evt.keyCode == 13)
    {
      obj.blur();
      return false;
    }

    if (evt.keyCode == 27)
    {
      obj.parentNode.innerHTML = org;
    }
  }*/
  $(txt).keypress(function(evt){
    if (evt.keyCode == 13){
	  this.blur();
      return false;
    }
    if (evt.keyCode == 27){
      this.parentNode.innerHTML = org;
    }
  
  });

  /* 编辑区失去焦点的处理函数 */
  txt.onblur = function(e){
    if ($.trim(txt.value).length > 0 && $.trim(txt.value) != org){
      $.getJSON(listTable.url,{"val":$.trim(txt.value),"id":id},function(res){
		  if(res.message){
			alertMsg.info(res.message);
		  }
		  obj.innerHTML = (res.status == 1) ? res.data : org;
	  });
	}else{
      obj.innerHTML = org;
    }
  }
}

/**
 * 切换状态
 */
listTable.toggle = function(obj, act, id){
  var val = (obj.src.match(/yes.gif/i)) ? 0 : 1;
  $.getJSON(act,{"val":val,"id":id},function(res){
	  if(res.message){
		alertMsg.info(res.message);
	  }
	  if(res.status == 1){
		obj.src = (res.data > 0) ? '/Public/Images/yes.gif' : '/Public/Images/no.gif';
	  } 
  });
}