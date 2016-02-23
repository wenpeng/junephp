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
 * 系统默认控制器
 */
class Home extends Base
{
    /**
     * 默认首页
     *
     * @param string $url_parameter URL传递过来的参数
     * @access public
     * @return string
     */
    public function index($url_parameter = null)
    {
        $dbinfo = $this->loadModel('home')->info();
        $this->loadHelper('utility');

        $this->tpl->set('usage',theUsage());
        $this->tpl->set('driver',$dbinfo['driver']);
        $this->tpl->set('version',$dbinfo['version']);
        $this->tpl->set('title','Hello');

        $this->tpl->show('home');
    }
}
