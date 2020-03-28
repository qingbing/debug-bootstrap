<?php
/**
 * @link        http://www.phpcorner.net
 * @author      qingbing<780042175@qq.com>
 * @copyright   Chengdu Qb Technology Co., Ltd.
 */
require("../vendor/autoload.php");

try {
    if ($_GET['c'] || !empty($_GET['c'])) {
        $className = $_GET['c'];
        $class = "\Test\\{$className}";
    } else {
        $class = "\DebugBootstrap\TestHelper";
    }
    /* @var $class \DebugBootstrap\Abstracts\Tester */
    $class::getInstance()->run();
} catch (Exception $e) {
    var_dump($e);
}