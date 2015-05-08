<?php
namespace ghoul\patch;


use ghoul\exception\UnknownMethodException;
use ghoul\StaticInstance;

class MethodRouter {
    /** @var Method[] */
    private static $methodPool = false;
    private static $savedMethodPool = false;
    private static function init(){
        if(!(self::$methodPool || self::$savedMethodPool)) {
            self::$methodPool = [];
            self::$savedMethodPool = [];
        }

    }
    private static function registerMethod(Method $method){
        //TODO Override function here
        self::$methodPool[$method->getName()] = $method;
    }
    public function execute($name, $args){
        if(isset(self::$methodPool[$name]) && StaticInstance::isBound()){
            self::$methodPool[$name]->execute(StaticInstance::getCurrentInstance()->getAdapter(), $args);
        }
        elseif(isset(self::$savedMethodPool[$name])){
            //TODO call original
        }
        else{
            throw new UnknownMethodException;
        }
    }
}