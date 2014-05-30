<?php
//注意，请不要在这里配置SAE的数据库，配置你本地的数据库就可以了。
return array(
    //'配置项'=>'配置值'
    'URL_CASE_INSENSITIVE'      =>      true,//URL是否不区分大小写
    'DB_PREFIX'                 =>      'a_',  //设置表前缀
    // 修改这里
    // 'DB_DSN'                 =>      'mysql://root:root@localhost:3306/agent',//使用DSN方式配置数据库信息
    // mysql:（数据库类型），帐号：密码@localhost（数据库地址）：端口/数据名称
    'TMPL_L_DELIM'              =>      '<{', //修改左定界符
    'TMPL_R_DELIM'              =>      '}>', //修改右定界符
    'SHOW_PAGE_TRACE'            =>      true,//开启页面Trace
    'APP_AUTOLOAD_PATH'         => '@.ORG', //自动加载项目类库
    'DB_TYPE'=> 'mysql',     // 数据库类型
    'DB_HOST'=> 'localhost', // 服务器地址

    'DB_NAME'=> 'cms',        // 数据库名,填写你创建的数据库
    'DB_USER'=> 'root',         // 用户名
    'DB_PWD'=> 'root',         // 密码

    //默认错误跳转对应的模板文件
    // 'TMPL_ACTION_ERROR' => THINK_PATH . 'Tpl/jump.html',
    //默认成功跳转对应的模板文件
    // 'TMPL_ACTION_SUCCESS' => THINK_PATH . 'Tpl/jump.html',

);
?>