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
 * 定义DEBUG模式
 * 调试模式 true
 * 生产模式 false
 */
define('APP_DEBUG', true);

/** 定义系统常量 */
define('APP_NAME', 'JunePHP');
define('APP_VERSION', '0.1.3');
define('APP_AUTHOR', 'Wen Peng');
define('APP_AUTHOR_EMAIL', 'wen@pengblog.com');
define('APP_WEBSITE', 'https://github.com/willper/JunePHP');

/** 定义功能模块路径 */
define('CORE_PATH', APP_ROOT . '/core/');
define('CONTROLLER_PATH', APP_ROOT . '/controller/');
define('MODEL_PATH', APP_ROOT . '/model/');
define('VIEW_PATH', APP_ROOT . '/view/');
define('HELPER_PATH', APP_ROOT . '/helper/');

/** 定义路由默认配置 */
define('DEFAULT_CONTROLLER', 'home');
define('DEFAULT_ACTION', 'index');

/** 定义数据库参数 */
$config['database'] = array(
    'database_type' => 'mysql',
    'server' => 'localhost',
    'username' => 'root',
    'password' => 'root',
    'database_name' => 'mvc',
);

/** 定义模板参数 */
$config['template'] = array(
    '_path' => VIEW_PATH,
    '_ext' => 'php',
    '_vars' => array(
        'app_name' => APP_NAME,
        'app_author' => APP_AUTHOR,
        'app_version' => APP_VERSION,
        'app_website' => APP_WEBSITE,
        'app_author_email' => APP_AUTHOR_EMAIL,
    )
);
