<?php
/**
 * @link        http://www.phpcorner.net
 * @author      qingbing<780042175@qq.com>
 * @copyright   Chengdu Qb Technology Co., Ltd.
 */
require("../vendor/autoload.php");


$className = \DebugBootstrap\TestCommand::getInstance()->getParam('c', null);

// php console.php --c=DebugCommand --id=5

try {
    if (null !== $className) {
        $class = "\Test\\{$className}";
    } else {
        $class = "\DebugBootstrap\\TestHelper";
    }
    /* @var $class \DebugBootstrap\Abstracts\Tester */
    $class::getInstance()->run();
} catch (\Exception $e) {
    var_dump($e);
}