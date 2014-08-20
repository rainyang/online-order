<?php

// 定义ThinkPHP框架路径
define('THINK_PATH', './ThinkPHP');
//定义项目名称和路径
define('APP_NAME', 'Manage');
define('APP_PATH', './Manage');

//define('NO_CACHE_RUNTIME', true);//不重新生成核心缓存
//define('STRIP_RUNTIME_SPACE', false);//设置对编译缓存的内容是否进行去空白和注释

// 加载框架入口文件
require(THINK_PATH."/ThinkPHP.php");
//实例化一个网站应用实例
App::run();
?>