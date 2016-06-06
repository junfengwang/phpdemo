<?php
/**
 * 配置文件
 * Created by PhpStorm.
 * User: wangjunfeng
 * Date: 16/1/14
 */

//路由配置
$GLOBALS['router'] = array(
    '/game/([1-9][0-9]*)' => array(
            'controller'  => 'product',
            'action'      => 'getPrice',
            'params'      => array(
                1 => 'id',
            ),
    ),
);

//加载类路径
$GLOBALS['autoload_path'] = array(
    FRAMEWORK_PATH.'/',
    APP_PATH.'/controller/',
);

//app类的属性（实例化相应对象）
$GLOBALS['auto_app_property'] = array(
    'request',
    'dispatch'
);

