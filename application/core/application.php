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
 * 路由基础类
 */
class Application
{
    /**
     * 当前控制器名称
     *
     * @access private
     * @var string
     */
    private $_controller;

    /**
     * 当前方法名称
     *
     * @access private
     * @var string
     */
    private $_action;

    /**
     * 当前URL传递来的参数
     *
     * @access private
     * @var array
     */
    private $_parameter;

    /**
     * 当前URL传递来的参数
     *
     * @access private
     * @var array
     */
    private $_unableActions = array('__construct', '__destruct');


    /**
     * 路由分发函数
     *
     * @return void
     * @access public
     */
    public function __construct()
    {
        $this->explodeUrl();
        if (file_exists(CONTROLLER_PATH . $this->_controller . '.php')) {
            $controller = $this->loadController($this->_controller);
            if (in_array(strtolower($this->_action), array_map('strtolower', get_class_methods($controller))) && !in_array($this->_action, $this->_unableActions)) {
                $controller->{$this->_action}($this->_parameter);
            } else {
                APP_DEBUG ? exit('Action ' . $this->_action . ' does not exist.') : return404();
            }
        } else {
            APP_DEBUG ? exit('Controller ' . $this->_controller . ' does not exist.') : return404();
        }
    }

    /**
     * 路由解析函数
     *
     * @param string $this->_controller 当前控制器名称
     * @param string $this->_action 当前方法名称
     * @param string $this->_parameter 当前URL传递来的参数
     * @return void
     * @access private
     */
    private function explodeUrl()
    {
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $url = urldecode($url);
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = trim($url, '/');
        $segments = $url ? explode('/', $url) : array();

        $this->_controller = isset($segments[0]) ? $segments[0] : DEFAULT_CONTROLLER;
        $this->_action = isset($segments[1]) ? $segments[1] : DEFAULT_ACTION;
        $this->_parameter = isset($segments[2]) ? array_slice($segments, 2) : null;
    }

    /**
     * 实例化控制器
     *
     * @param string $controller 需要实例化的控制器名称
     * @return object
     * @access private
     */
    private function loadController($controller)
    {
        $path = CONTROLLER_PATH . strtolower($controller) . '.php';
        if (file_exists($path)) {
            require $path;
            return new $controller();
        } else {
            APP_DEBUG ? exit('Controller ' . $controller . ' does not exist.') : return404();
        }
    }
}
