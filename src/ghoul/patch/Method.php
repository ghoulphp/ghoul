<?php
namespace ghoul\patch;

use League\Flysystem\AdapterInterface;

abstract class Method{
    abstract public function execute(AdapterInterface $adapter, $args);
    abstract public function getName();
    public function supportsAdapter(AdapterInterface $interface){
        return true;
    }
}