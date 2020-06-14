<?php

namespace Mastering\SampleModule\Model\Handler;

use Monolog\Logger;
use Magento\Framework\Logger\Handler\Base;

class DebugHandler extends Base
{
    /**
     * @var string
     */
    protected $fileName = '/var/log/debug_custom.log';

    /**
     * @var int
     */
    protected $loggerType = Logger::DEBUG;
}
