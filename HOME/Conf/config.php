<?php
return array(
	//'配置项'=>'配置值'
	 /** URL设置*/
   'URL_HTML_SUFFIX'=>'.html',//URL伪静态后缀设置
    'URL_MODEL'=>3, // 如果你的环境不支持PATHINFO 请设置为3
	'DB_TYPE'=>'mysql',

	'DB_HOST'=>'gomenuhub3.db.10698022.hostedresource.com',
	'DB_NAME'=>'gomenuhub3',
	'DB_USER'=>'gomenuhub3',
	'DB_PWD'=>'hub3@ADS0701',



	'DB_PORT'=>'3306',
	'DB_PREFIX'=>'on_',//表前缀
	'CACHE_TIME'=>3600,//缓存时间 单位是秒

	'APP_DEBUG' => false,	//调试模式开关
	'TOKEN_ON'=>false, 
);
?>
