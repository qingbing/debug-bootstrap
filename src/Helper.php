<?php
/**
 * @link        http://www.phpcorner.net
 * @author      qingbing<780042175@qq.com>
 * @copyright   Chengdu Qb Technology Co., Ltd.
 */

namespace DebugBootstrap;

/**
 * 帮助函数
 *
 * Class Helper
 * @package DebugBootstrap
 */
class Helper
{
    /**
     * 判断是否是在cli模式下运行
     *
     * @return bool
     */
    public static function isCli(): bool
    {
        return PHP_SAPI === 'cli';
    }
}