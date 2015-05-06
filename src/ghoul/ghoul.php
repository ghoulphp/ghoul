<?php
/*
                   _.-,
              _ .-'  / .._
           .-:'/ - - \:::::-.
         .::: '  e e  ' '-::::.
        ::::'(    ^    )_.::::::
       ::::.' '.  o   '.::::'.'/_
   .  :::.'       -  .::::'_   _.:
 .-''---' .'|      .::::'   '''::::
'. ..-:::'  |    .::::'        ::::
 '.' ::::    \ .::::'          ::::
      ::::   .::::'           ::::
       ::::.::::'._          ::::
        ::::::' /  '-      .::::
         '::::-/__    __.-::::'
           '-::::::::::::::-'
              '''::::'''
 */
namespace ghoul;

use ghoul\exception\GhoulishException;
use League\Flysystem\AdapterInterface;

class ghoul{
    /** @var  AdapterInterface */
    private $adapter;

    public function __construct($options){
        $this->isBound = false;
    }
    public function with(AdapterInterface $adapter){
        $this->adapter = $adapter;
    }
    public function bind($force = false){
        StaticInstance::bindInstance($this, $force);
    }
    public function release($removeRef = false){
        StaticInstance::releaseInstance($this, $removeRef);
    }
    public function isBound(){
        return StaticInstance::isInstanceBound($this);
    }
    /**
     * @return mixed
     */
    public function getAdapter(){
        return $this->adapter;
    }
    /**
     * @param AdapterInterface $adapter
     */
    public function setAdapter(AdapterInterface $adapter){
        $this->adapter = $adapter;
    }
    public static function halt($removeRef = false){
        StaticInstance::releaseInstance(StaticInstance::getCurrentInstance(), $removeRef);
    }
    public static function resume(){
        StaticInstance::bindInstance(StaticInstance::getCurrentInstance());
    }
}