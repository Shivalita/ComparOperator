<?php
function loadClass($class)
{
    // require_once('classes/'.$class.'.php');
    require_once(ROOT.DS.'assets'.DS.'classes'.DS.$class.'.php');
}

spl_autoload_register('loadClass');