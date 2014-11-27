<?php
    class TestAction extends Action{
        public function index(){
            //根据当前模块名来判断要执行那个城市的操作
             $cityName = MODULE_NAME;
            $this->city($cityName);
        }
        //注意 city方法 本身是 protected 方法
        public function ss($name){
            echo "test";
            //和$name这个城市相关的处理
        }
    }

