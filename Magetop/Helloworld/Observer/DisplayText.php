<?php
namespace Magetop\Helloworld\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class DisplayText implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        $message  = $observer->getData('hello_message');
        echo "Text trước event: " . $message . "<br>";
        $message .= " Đẹp Trai";
        echo "Text sau event: " . $message;
    }
}
