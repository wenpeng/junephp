<?php
/**
 * JunePHP
 * It's just a lightweight PHP framework.
 *
 * @author Wen Peng <wen@pengblog.com>
 * @link https://github.com/willper/JunePHP
 * @license GNU General Public License 2.0
 */

/**
 * Session基础类
 */
class Session
{

    /**
     * 初始化
     * @access public
     */
    public static function init()
    {
        if (!session_id()) session_start();
    }

    /**
     * 注册变量
     *
     * @param string $key 需要注册的变量的名称
     * @param string $value 需要注册的变量的值
     * @access public
     * @return boolean
     */
    public static function set($key, $value='')
    {
        if (!is_array($key)) {
            $_SESSION[$key] = $value;
        } else {
            foreach ($key as $k => $v) $_SESSION[$k] = $v;
        }
    }

    /**
     * 获取变量
     *
     * @param string $key 需要获取的变量的名称
     * @access public
     * @return string
     */
    public static function get($key)
    {
        return (isset($_SESSION[$key])) ? $_SESSION[$key] : null;
    }

    /**
     * 注销变量
     *
     * @param string $key 需要注销的变量的名称
     * @access public
     * @return boolean
     */
    public static function delete($key)
    {
        if (is_array($key)) {
            foreach ($key as $item){
                if (isset($_SESSION[$item])) unset($_SESSION[$item]);
            }
        } else {
            if (isset($_SESSION[$key])) unset($_SESSION[$key]);
        }
    }

    /**
     * 检查变量状态
     *
     * @param string $key 需要检查的变量的名称
     * @access public
     * @return boolean
     */
    public static function check($key)
    {
        return isset($_SESSION[$key]);
    }

    /**
     * 清除会话
     *
     * @access public
     * @return void
     */
    public static function clear()
    {
        session_destroy();
        $_SESSION = array();
    }
}
