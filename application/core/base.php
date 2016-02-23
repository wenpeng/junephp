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
 * 通用基础类
 */
class Base
{
    /**
     * 模板引擎适配器
     * @var templateInit
     */
    private static $_templateContainer;

    /**
     * 数据库适配器
     * @var databaseInit
     */
    private static $_databaseContainer;

    /**
     * 实例化当前配置
     *
     * @access public
     */
    public function __construct()
    {
        $this->tpl = self::templateInit();
        $this->db = self::databaseInit();
        Session::init();
    }

    /**
     * 获取系统配置
     *
     * @access private
     * @param string $key
     * @return array
     */
    private static function getConfig($key = null)
    {
        global $config;
        if ($key && $config[$key]) {
            return $config[$key];
        }
        return $config;
    }

    /**
     * 初始化模板引擎
     *
     * @access private
     * @return object
     */
    private static function templateInit()
    {
        if( self::$_templateContainer == null ){
            self::$_templateContainer = new Template(self::getConfig('template'));
        }
        return self::$_templateContainer;
    }

    /**
     * 初始化数据库
     *
     * @access private
     * @return object
     */
    private static function databaseInit()
    {
        if (self::$_databaseContainer == null){
            self::$_databaseContainer = new Medoo(self::getConfig('database'));
        }
        return self::$_databaseContainer;
    }

    /**
     * 载入模型
     *
     * @param string $helper 需要载入的模型名称
     * @access protected
     * @return object
     */
    protected function loadModel($model)
    {
        $path = MODEL_PATH . strtolower($model) . '.php';
        if (file_exists($path)) {
            require $path;
            $modelName = $model . '_Model';
            return new $modelName();
        } else {
            APP_DEBUG ? exit('Model ' . $model . ' does not exist.') : return404();
        }
    }

    /**
     * 载入辅助函数
     *
     * @param string $helper 需要载入的辅助函数所在的文件名称
     * @access protected
     * @return void
     */
    protected function loadHelper($helper)
    {
        $path = HELPER_PATH . strtolower($helper) . '.php';
        if (file_exists($path)) {
            require $path;
        } else {
            APP_DEBUG ? exit('Helper ' . $helper . ' does not exist.') : return404();
        }
    }

    /**
     * 重定向函数
     *
     * @param string $url 重定向目标URL
     * @param string $end 终止当前进程
     * @param string $status HTTP状态码
     * @access protected
     * @return void
     */
    protected function redirect($url,$end=true,$status=302)
    {
        header('Location: '.$url, true, $status);
        if ($end) {
            exit(0);
        }
    }
}
