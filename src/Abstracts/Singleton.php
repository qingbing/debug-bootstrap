<?php
/**
 * @link        http://www.phpcorner.net
 * @author      qingbing<780042175@qq.com>
 * @copyright   Chengdu Qb Technology Co., Ltd.
 */

namespace DebugBootstrap\Abstracts;

/**
 * @author      qingbing<780042175@qq.com>
 * @describe    单例模式（工厂）
 *
 * Class Singleton
 * @package DebugBootstrap\Abstracts
 */
abstract class Singleton
{
    /**
     * @describe    魔术方法：构造函数，禁用外部 new
     */
    final private function __construct()
    {
    }

    /**
     * @describe    存储实例
     *
     * @var array
     */
    private static $_instances = [];

    /**
     * @describe    获取实例
     */
    public static function getInstance()
    {
        $className = get_called_class();
        if (!isset(self::$_instances[$className])) {
            $class = new $className();
            // 相当于类的构造函数函数
            /* @var $class $this */
            $class->init();
            self::$_instances[$className] = $class;
        }
        return self::$_instances[$className];
    }

    /**
     * @describe    构造函数后执行
     */
    protected function init()
    {
    }

    /**
     * @describe    魔术方法：禁用实例 clone
     */
    final private function __clone()
    {
    }
}