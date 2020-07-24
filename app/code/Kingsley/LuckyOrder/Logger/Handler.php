<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Kingsley\LuckyOrder\Logger;

use Magento\Framework\Logger\Handler\Base;

use Monolog\Logger;

class Handler extends Base
{
    /**
     * @var string
     */
    protected $fileName = '/var/log/Kingsley_debug.log';

    /**
     * @var int
     */
    protected $loggerType = Logger::DEBUG;
}
