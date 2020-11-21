<?php
namespace Magetop\Helloworld\Controller\Adminhtml\Import;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Magetop\Helloworld\Controller\Adminhtml\Import;
use Magetop\Helloworld\Model\ImportFactory;

class Index extends Import
{
    public function __construct(Context $context, Registry $coreRegistry, PageFactory $resultPageFactory, ImportFactory $importFactory)
    {
        parent::__construct($context, $coreRegistry, $resultPageFactory, $importFactory);
    }

    public function execute()
    {
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('Magetop_Helloworld::import_customer');
        $resultPage->getConfig()->getTitle()->prepend(__('Import Customer By Huy'));

        return $resultPage;
    }
}
