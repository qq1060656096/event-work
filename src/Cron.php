<?php
namespace Zwei\EventWork;

use Zwei\EventWork\Config\CronConfig;

/**
 * �ƻ�����
 * Class Cron
 * @package Zwei\EventWork
 */
class Cron extends Base
{
    /**
     * ���мƻ�����
     * @param string $cronName cron��
     * @return mixed
     */
    public static final function run($cronName)
    {
        $config = new CronConfig();
        $class = $config->getCronClass($cronName);
        $callbackFunc = $config->getCronCallbackFunc($cronName);
        // ����cron
        $obj    = new $class();
        return call_user_func_array([$obj, $callbackFunc], [$class]);
    }
}