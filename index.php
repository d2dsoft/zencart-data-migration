<?php

/**
 * D2dSoft
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL v3.0) that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL: https://d2d-soft.com/license/AFL.txt
 *
 * DISCLAIMER
 * Do not edit or add to this file if you wish to upgrade this extension/plugin/module to newer version in the future.
 *
 * @author     D2dSoft Developers <develop@d2d-soft.com>
 * @copyright  Copyright (c) 2021 D2dSoft (https://d2d-soft.com)
 * @license    https://d2d-soft.com/license/AFL.txt
 */

error_reporting(0);
ini_set('display_errors', 0);

session_start();
define('DS', DIRECTORY_SEPARATOR);
define('_ROOT_DIR', dirname(__FILE__));
define('_APP_DIR', _ROOT_DIR . DS . 'app');

include _APP_DIR . DS . 'bootstrap.php';

$bootstrap = Bootstrap::getInstance();
$bootstrap->run();