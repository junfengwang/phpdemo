<?php
/**
 * 自动加载类
 * User: wangjunfeng
 * Date: 16/1/14
 */

class Classload
{
    /**
     * 自动加载
     * @param $class
     */
    public static function autoload($class) {
        $class = strtolower($class);

        //想做到配置了一些路径，路径下面的对象都可以直接用，目前的有问题
        if (isset($GLOBALS['autoload_path']) && $GLOBALS['autoload_path']) {
            foreach ($GLOBALS['autoload_path'] as $path) {
                $file = $path.$class.'.php';
                if (is_file($file)) {
                    require_once($file);
                    break;
                }
            }
        } else {
            $file  = APP_PATH.'/controller/'.$class.'.php';
            if (is_file($file)) {
                require_once($file);
            }
        }


    }

    /**
     * 注册自动加载方法
     * @param string $func
     */
    public static function  autoloadRegiest($func='Classload::autoload') {
        spl_autoload_register($func);
    }

}
