<?php

/**
* Trigger thi file on Plugin uninstall
*
* @package SandyhutPlugin
**/

// if uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

//Clean up!
