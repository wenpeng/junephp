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
 * 系统默认模型
 */
class Home_Model extends Base
{
    /**
     * 获取数据库信息
     *
     * @access public
     * @return array
     */
    public function info()
    {
        return $this->db->info();
    }
}
