<?php
namespace Magetop\Helloworld\Controller\Adminhtml\Posts;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Magetop\Helloworld\Controller\Adminhtml\Posts;
use Magetop\Helloworld\Model\PostsFactory;

class Index extends Posts
{
    public function __construct(Context $context, Registry $coreRegistry, PageFactory $resultPageFactory, PostsFactory $postsFactory)
    {
        parent::__construct($context, $coreRegistry, $resultPageFactory, $postsFactory);
    }

    public function execute()
    {
        if ($this->getRequest()->getQuery('ajax')) {
            $this->_forward('grid');
            return;
        }

        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('Magetop_Helloworld::helloworld_menu');
        $resultPage->getConfig()->getTitle()->prepend(__('Manage Posts'));

        return $resultPage;
    }
}
