<?php
/**
 * @link        http://www.phpcorner.net
 * @author      qingbing<780042175@qq.com>
 * @copyright   Chengdu Qb Technology Co., Ltd.
 */

namespace DebugBootstrap;


use DebugBootstrap\Abstracts\Singleton;

/**
 * @author      qingbing<780042175@qq.com>
 * @describe    TestCommand
 *
 * Class TestCommand
 * @package DebugBootstrap
 */
class TestCommand extends Singleton
{
    /**
     * @describe    脚步文件
     *
     * @var string
     */
    private $_scriptFile;
    /**
     * @describe    传递参数
     *
     * @var array
     */
    private $_params = [];

    /**
     * 单例模式初始化函数，在构造函数后执行，子类可以覆盖
     */
    protected function init()
    {
        $this->_scriptFile = $_SERVER['SCRIPT_NAME'];
        for ($i = 1; $i < $_SERVER['argc']; $i++) {
            $arg = $_SERVER['argv'][$i];
            // 用 "--" 开头作为参数标志
            if (0 !== strpos($arg, '--')) {
                continue;
            }
            // 参数名和参数用 "=" 隔开
            $pos = strpos($arg, '=');
            if (false === $pos) { // 没有分隔符
                continue;
            }
            $name = trim(substr($arg, 2, $pos - 2));
            $value = trim(substr($arg, $pos + 1));
            $this->_params[$name] = $value;
        }
    }

    /**
     * @describe    获取命令行的传递参数
     *
     * @return array
     */
    public function getParams(): array
    {
        return $this->_params;
    }

    /**
     * @describe    获取命令行执行的某个参数
     *
     * @param string|null $name
     * @param mixed $defaultVal
     *
     * @return mixed|null
     */
    public function getParam(string $name = null, $defaultVal = null)
    {
        return isset($this->_params[$name]) ? $this->_params[$name] : $defaultVal;
    }
}