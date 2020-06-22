<?php
/**
 * @link        http://www.phpcorner.net
 * @author      qingbing<780042175@qq.com>
 * @copyright   Chengdu Qb Technology Co., Ltd.
 */

namespace Test\Web;


use DebugBootstrap\Abstracts\Tester;

/**
 * Class DebugWeb
 * @package Test
 */
class DebugWeb extends Tester
{
    /**
     * 执行函数
     */
    public function run()
    {
        var_dump(111);
    }
}