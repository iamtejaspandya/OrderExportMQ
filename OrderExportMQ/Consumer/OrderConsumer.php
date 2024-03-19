<?php

namespace Tejas\OrderExportMQ\Consumer;

class OrderConsumer
{
    /**
     * Logging instance
     * @var \Tejas\Log\Logger\Logger
     */
    protected $_logger;

    /**
     * Constructor
     * @param \Tejas\Log\Logger\Logger $logger
     */
    public function __construct(
        \Tejas\Log\Logger\Logger $logger
    ) {
        $this->_logger = $logger;
    }

    public function consumerProcess($operation)
    {
        $this->_logger->info($operation);
    }
}























// namespace Tejas\OrderExportMQ\Consumer;

// class OrderConsumer
// {
//     protected $exportHelper;

//     public function __construct(
//         \Custom\OrderExport\Helper\Data $exportHelper
//     ) {
//         $this->exportHelper = $exportHelper;
//     }

//     public function processMessage($message)
//     {
//         // Process the message (e.g., log it)
//         $jsonData = $message->getBody();
//         $this->exportHelper->logData($jsonData);
//     }
// }