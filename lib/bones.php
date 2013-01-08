<?php
/**
 * Created by IntelliJ IDEA.
 * User: chenbing
 * Date: 13-1-8
 * Time: 下午2:49
 * To change this template use File | Settings | File Templates.
 */

<?php

    ini_set('display_errors','On');
    error_reporting(E_ERROR | E_PARSE);

    function get($route, $callback){
        Bones::register($route,$callback);
    }

    class Bones {
        private static $instance ;
        private static $route_found = false;
        public $route = '';

        public static function get_instance(){
            if(!isset(self::$instance)){
                self::$instance = new Bones();
            }
            return self::$instance;
        }

        public function __construct(){
            $this->route = $this->get_route();
        }

        protected function get_route(){
            parse_str($_SERVER['QUERY_STRING'], $route) ;
            if($route) {
                return '/' . $route['request'];
            } else {
                return '/';
            }
        }

        public static function register($route, $callback){
            $bones = static::get_instance();

            if($route == $bones->route && !static::$route_found){
                static::$route_found = true ;
                echo $callback($bones);
            } else {
                return false;
            }
        }
    }

