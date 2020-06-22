<?php
/**
 * @link        http://www.phpcorner.net
 * @author      qingbing<780042175@qq.com>
 * @copyright   Chengdu Qb Technology Co., Ltd.
 */

namespace DebugBootstrap\Abstracts;

/**
 * 单例模式（工厂）,测试抽象类
 *
 * Class Tester
 * @package DBootstrap\Abstracts
 */
abstract class Tester extends Singleton
{
    /**
     * 执行函数
     */
    abstract public function run();
}