<?php
/**
 *
 * Created by PhpStorm.
 * User: wangjunfeng
 * Date: 16/1/15
 */

class App
{
    static $instance=null;

    public function __get($name) {
        if (in_array($name, $GLOBALS['auto_app_property'])) {
            $result = new $name();
        } else {
            //错误输出什么的
        }
        return $result;
    }

    //获取单例
    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    //初始化
    public function run() {
        $this->dispatch->match();
    }
}