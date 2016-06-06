<?php
/**
 * Created by PhpStorm.
 * User: wangjunfeng
 * Date: 16/1/15
 */

class Request
{
    /**
     * 设置参数
     * @param $rule
     * @param $match_arr
     */
    public function setParams($rule, $match_arr=array()) {
        if (isset($rule['params']) && $rule['params']) {
            foreach ($rule['params'] as $k=>$v) {
                $_REQUEST[$v] = $match_arr[$k];
            }
        }
    }

    /**
     * 获取参数
     * @param $name
     * @return string
     */
    public function getParams($name) {
        if (isset($_REQUEST[$name])) {
            return $_REQUEST[$name];
        }
        return '';
    }
}