<?php
/**
 * @link        http://www.phpcorner.net
 * @author      qingbing<780042175@qq.com>
 * @copyright   Chengdu Qb Technology Co., Ltd.
 */

namespace Test\Command;

use DebugBootstrap\Abstracts\Tester;
use DebugBootstrap\TestCommand;

/**
 * @author      qingbing<780042175@qq.com>
 * @describe    DebugCommand
 *
 * Class DebugCommand
 * @package Test
 */
class DebugCommand extends Tester
{
    /**
     * @describe    执行函数
     */
    public function run()
    {
        // 查找所有的参数
        print_r(TestCommand::getInstance()->getParams());
        // 查找具体的某个参数值
        var_dump(TestCommand::getInstance()->getParam('id', 'null'));
    }
}