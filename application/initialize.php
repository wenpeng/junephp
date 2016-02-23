<?php
/**
 * JunePHP
 * It's just a lightweight PHP framework.
 *
 * @author Wen Peng <wen@pengblog.com>
 * @link https://github.com/willper/JunePHP
 * @license GNU General Public License 2.0
 */

/** 定义根目录 */
define('APP_ROOT', dirname(__FILE__));

/** 载入核心配置 */
require 'config/config.php';

/** 选择DEBUG模式 */
if (APP_DEBUG) {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
} else {
    error_reporting(0);
    ini_set("display_errors", 0);
}

/**
 * 404错误输出
 *
 * @param string $message 要输出的消息
 * @return string
 */
function return404($message = '404 Not Found')
{
    header('HTTP/1.1 404 Not Found');
    header("status: 404 Not Found");
    exit($message);
}

/**
 * 自动装载函数
 *
 * @param string $message 要注册的类的名称
 * @return void
 */
function autoLoad($className)
{
    $className = strtolower($className);
    if (file_exists( CORE_PATH . $className . '.php')) {
        require CORE_PATH . $className . '.php';
    }else{
        APP_DEBUG ? exit('Core ' . $className . ' does not exist.') : return404();
    }
}

/** 注册自动装载函数 */
spl_autoload_register("autoLoad");

/** 启动应用 */
new application();
