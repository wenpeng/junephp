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
 * 内用耗用
 *
 * @return string
 */
function memoryUsage(){
    return memory_get_usage()/1024/1024;
}

/**
 * 进程时间
 *
 * @return string
 */
function queryTime(){
    return microTimeFloat() - microTimeFloat(START_TIME);
}

/**
 * 进程耗费时间
 *
 * @param string $micro_array 待计算的时间数组
 * @return string
 */
function microTimeFloat($micro_array = null){
    $micro_tmp = $micro_array ? $micro_array : microtime();
    $result = explode(' ', $micro_tmp);
    return $result[1] + $result[0];
}

/**
 * 总体耗费描述
 *
 * @return string
 */
function theUsage(){
    return "Memory used：". memoryUsage() ." mb, Progress times：". queryTime() ." s.";
}
