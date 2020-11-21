<?php
namespace Magetop\Helloworld\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class TextEvent extends Action
{
    protected $_pageFactory;

    public function __construct(Context $context, PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $text = 'Hello Huy';
        $this->_eventManager->dispatch('magetop_hello_display_text_before', ['hello_message' => $text]);
    }
}
