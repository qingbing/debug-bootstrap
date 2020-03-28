<?php
/**
 * @link        http://www.phpcorner.net
 * @author      qingbing<780042175@qq.com>
 * @copyright   Chengdu Qb Technology Co., Ltd.
 */

namespace DebugBootstrap;


use DebugBootstrap\Abstracts\Tester;

/**
 * @author      qingbing<780042175@qq.com>
 * @describe    web测试连接组合
 *
 * Class TestHelper
 * @package DebugBootstrap
 */
class TestHelper extends Tester
{
    /**
     * @describe    执行函数
     */
    public function run()
    {
        $urls = [];
        $dir = realpath('.') . "/src";
        // 将目录文件读取成链接数组
        $op = opendir($dir);
        while ($fp = readdir($op)) {
            // 排除当前和上级目录
            if ('.' === $fp || '..' === $fp) {
                continue;
            }
            // 排除目录，只读取文件
            if (!is_file("{$dir}/{$fp}")) {
                continue;
            }
            $className = pathinfo($fp, PATHINFO_FILENAME);
            array_push($urls, $this->getBaseUri() . $className);
        }
        closedir($op);

        // 制作链接视图
        if (isset($_SERVER['argc']) && $_SERVER['argc'] > 0) {
            echo implode("\r\n", $urls) . "\r\n\r\n";
        } else {
            $aString = [];
            foreach ($urls as $url) {
                array_push($aString, "<a href='{$url}' target='_blank'>{$url}</a>");
            }
            echo implode("\r\n<br/>", $aString);
        }
    }

    /**
     * @describe    获取测试访问链接
     *
     * @return string
     */
    protected function getBaseUri(): string
    {
        static $_baseUri;
        if (null === $_baseUri) {
            if (isset($_SERVER['argc']) && $_SERVER['argc'] > 0) {
                $_baseUri = "php {$_SERVER['SCRIPT_NAME']} --c=";
            } else {
                $_baseUri = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['SCRIPT_NAME']}?c=";
            }
        }
        return $_baseUri;
    }
}