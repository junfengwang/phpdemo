<?php
/**
 * 路由调用类
 * Created by PhpStorm.
 * User: wangjunfeng
 * Date: 16/1/14
 */
class Dispatch extends App
{
    public $rules;

    public function __construct() {
        $this->rules       = $GLOBALS['router'];
        $this->request_uri = $_SERVER['REQUEST_URI'];
    }

    /**
     * 匹配路由
     */
    public function match() {
        $is_match = 0;
        foreach ($this->rules as $pattern=>$v) {
            //正则
            $pattern = '/'.str_replace('/', '\/', $pattern).'/';

            //匹配
            if (preg_match($pattern, $this->request_uri, $match_arr)) {
                $is_match = 1;
                //处理参数
                if (isset($v['params'])) {
                    $this->request->setParams($v, $match_arr);
                }

                //调用
                $this->invoke($v);
                break;
            }
        }

        //没有匹配到的话
        if ($is_match === 0) {
            $this->invoke(array('controller'=>'product', 'action'=>'index'));
        }
    }

    /**
     * 调用
     * @param array $params
     */
    public function invoke($params=array()) {
        $class  = $params['controller'];
        $action = $params['action'];


//        这种简单的方法不好吗？
//        $obj = new $class;
//        $obj->$action();
//        exit();

        //建立反射类
        $reflection = new ReflectionClass($class);

        //实例化类
        $instance   = $reflection->newInstance();

        //获取方法
        $method     = $reflection->getMethod($action);

        //执行方法
        $method ->invoke($instance);

//        用这个方法，$_REQUEST为什么接受不到里面的参数
//        $method ->invokeArgs($instance, array(1=>'666'));



    }
}