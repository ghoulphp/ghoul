<?php
namespace ghoul;


use ghoul\exception\BindUnavailableException;

class StaticInstance {
    /** @var  ghoul */
    static private $currentAdapter;
    static private $isBound = false;

    static private function init(){

    }
    static public function bindInstance(ghoul $instance, $force = false){
        if($force && StaticInstance::$isBound){
            StaticInstance::$currentAdapter->release();
        }

        if(!StaticInstance::$isBound && $instance != null){
            StaticInstance::$currentAdapter = $instance;
            StaticInstance::$isBound = true;
        }
        else{
            throw new BindUnavailableException;
        }
    }
    static public function releaseInstance(ghoul $instance, $removeRef = false){
        if($instance === StaticInstance::$currentAdapter){
            StaticInstance::$isBound = false;
            if($removeRef) StaticInstance::$currentAdapter = null;
        }
    }
    static public function isBound(){
        return StaticInstance::$isBound;
    }
    static public function getCurrentInstance(){
        return StaticInstance::$currentAdapter;
    }
    static public function isInstanceBound(ghoul $instance){
        return StaticInstance::$currentAdapter === $instance && StaticInstance::$isBound === true;
    }
}