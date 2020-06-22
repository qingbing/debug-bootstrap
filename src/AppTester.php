<?php
/**
 * @link        http://www.phpcorner.net
 * @author      qingbing<780042175@qq.com>
 * @copyright   Chengdu Qb Technology Co., Ltd.
 */

namespace DebugBootstrap;

use DebugBootstrap\Abstracts\Singleton;

/**
 * 定义缓存目录
 */
defined("ZF_RUNTIME") or define("ZF_RUNTIME", dirname(realpath('.')) . '/runtime');

/**
 * @author      qingbing<780042175@qq.com>
 * @describe    AppTester
 *
 * Class AppTester
 * @package DebugBootstrap
 */
class AppTester extends Singleton
{
    /**
     * @describe    运行web任务
     */
    public function runWeb()
    {
        try {
            if (Helper::isCli()) {
                throw new \Exception("该程序是web模式，只能在客户端运行", 100100101);
            }

            if (isset($_GET['c']) || !empty($_GET['c'])) {
                $className = $_GET['c'];
                $class     = "\Test\Web\\{$className}";
            } else {
                $class = "\DebugBootstrap\TestHelper";
            }
            /* @var $class \DebugBootstrap\Abstracts\Tester */
            $class::getInstance()->run();
        }
        catch (\Exception $e) {
            var_dump($e);
        }
    }

    /**
     * @describe    运行控制台任务
     */
    public function runConsole()
    {
        try {
            if (!Helper::isCli()) {
                throw new \Exception("该程序是cli模式，只能在命令行模式下用脚步执行", 100100102);
            }

            $className = TestCommand::getInstance()->getParam('c', null);
            if (null !== $className) {
                $class = "\Test\Command\\{$className}";
            } else {
                $class = "\DebugBootstrap\TestHelper";
            }
            /* @var $class \DebugBootstrap\Abstracts\Tester */
            $class::getInstance()->run();
        }
        catch (\Exception $e) {
            var_dump($e);
        }
    }
}