<?php
namespace hey {
    namespace hey\foo {
        class Magic{

        }
    }
}
namespace foo;

$cfg = [1, 2, 3];
Magic::$cfg("Hello");