<?php
namespace Magetop\Helloworld\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magetop\Helloworld\Model\PostsFactory;

class Lists extends Action
{
    protected $_pageFactory;
    protected $_postsFactory;

    public function __construct(Context $context, PageFactory $pageFactory, PostsFactory $postsFactory)
    {
        $this->_pageFactory = $pageFactory;
        $this->_postsFactory = $postsFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $pageFactory = $this->_pageFactory->create();

        $pageFactory->getConfig()->getTitle()->set(__('Posts List'));
        if ($pageFactory->getLayout()->getBlock('breadcrumbs')) {
            $breadcrumbs = $pageFactory->getLayout()->getBlock('breadcrumbs');
            $breadcrumbs->addCrumb(
                'home',
                [
                    'label' => __('Home'),
                    'title' => __('Home'),
                    'link' => $this->_url->getUrl('')
                ]
            );
            $breadcrumbs->addCrumb(
                'booking_search',
                [
                    'label' => __('Posts'),
                    'title' => __('Posts')
                ]
            );
        }
        return $pageFactory;
    }
}
