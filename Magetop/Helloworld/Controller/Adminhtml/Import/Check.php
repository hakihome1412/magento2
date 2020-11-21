<?php
namespace Magetop\Helloworld\Controller\Adminhtml\Import;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Magetop\Helloworld\Controller\Adminhtml\Import;
use Magetop\Helloworld\Model\ImportFactory;

class Check extends Import
{
    public function __construct(Context $context, Registry $coreRegistry, PageFactory $resultPageFactory, ImportFactory $importFactory)
    {
        parent::__construct($context, $coreRegistry, $resultPageFactory, $importFactory);
    }

    public function execute()
    {
        $arr = ['status' => "ok" , 'data' => ['a' => 1 , 'b' => 2]];

        return json_encode($arr);
    }
}
