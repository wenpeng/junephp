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
 * 模版引擎基础类
 */
class Template
{
    /**
     * 模板变量
     *
     * @access private
     * @var array
     */
    private $_vars;

    /**
     * 模板目录路径
     *
     * @access private
     * @var string
     */
    private $_path;

    /**
     * 模板文件扩展名
     *
     * @access private
     * @var string
     */
    private $_ext = 'php';

    /**
     * 模板引擎类构造函数
     *
     * @param array $config 模板参数
     * @access public
     * @return void
     */
    public function __construct($config = array())
    {
        foreach ($config as $key => $value) {
            $this->$key = $value;
        }
    }

    /**
     * 注册模版变量
     *
     * @param string $name 需要注册的模板变量的名称
     * @param string $value 需要注册的模板变量的值
     * @access public
     * @return void
     */
    public function set($name, $value)
    {
        $this->_vars[$name] = $value;
    }

    /**
     * 载入模版
     *
     * @param string $file 需要载入的模板文件名称
     * @access public
     * @return string
     */
    public function show($file)
    {
        echo $this->load($file);
    }

    /**
     * 渲染模版
     *
     * @param string $file 需要渲染的模板文件名称
     * @access private
     * @return string
     */
    private function load($file)
    {
        $file_path = $this->_path . $file . '.' .$this->_ext;
        if (!file_exists($file_path)) {
            APP_DEBUG ? exit('Template ' . $file . ' does not exist.') : return404();
        }
        extract($this->_vars);
        ob_start();
        include $file_path ;
        $contents = ob_get_contents();
        ob_end_clean();
        return $contents;
    }
}
