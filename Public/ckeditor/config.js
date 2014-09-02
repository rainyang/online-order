/*
Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	config.filebrowserBrowseUrl = '/Public/ckeditor/ckfinder/ckfinder.html';
	config.filebrowserImageBrowseUrl= '/Public/ckeditor/ckfinder/ckfinder.html?Type=Images';
	config.filebrowserFlashBrowseUrl = '/Public/ckeditor/ckfinder/ckfinder.html?Type=Flash';
	config.filebrowserUploadUrl = '/Public/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	config.filebrowserImageUploadUrl = '/Public/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
	config.filebrowserFlashUploadUrl = '/Public/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
	config.filebrowserWindowWidth = '640';  
	config.filebrowserWindowHeight = '480';
};
