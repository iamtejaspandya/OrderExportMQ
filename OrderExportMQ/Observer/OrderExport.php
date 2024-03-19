<?php

namespace Tejas\OrderExportMQ\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\MessageQueue\PublisherInterface;

class OrderExport implements ObserverInterface
{
    protected $publisher;

    public function __construct(
        PublisherInterface $publisher
    ) {
        $this->publisher = $publisher;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $order = $observer->getEvent()->getOrder();
        
        $orderData = [
            'order_id' => $order->getIncrementId(),
            'email' => $order->getCustomerEmail(),
            'total' => $order->getGrandTotal()
        ];

        $jsonData = json_encode($orderData);

        $this->publisher->publish('orderExport.topic', $jsonData);
    }
}

