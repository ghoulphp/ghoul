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

class ghoul{
    public function __construct(){

    }
    /*
        Allows any method that is conceptually static to
        be called from a static context.
    */
    /*public static function __callStatic($name, $args){
        return ((new ghoul())->$name(...$args) || new ghoul());
    }*/
}