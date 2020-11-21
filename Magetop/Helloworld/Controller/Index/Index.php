<?php
namespace Magetop\Helloworld\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magetop\Helloworld\Helper\Data;
use Magetop\Helloworld\Model\PostsFactory;

class Index extends Action
{
    protected $_pageFactory;
    protected $_postsFactory;
    protected $_dataHelper;

    public function __construct(Context $context, PageFactory $pageFactory, PostsFactory $postsFactory, Data $dataHelper)
    {
        $this->_pageFactory = $pageFactory;
        $this->_postsFactory = $postsFactory;
        $this->_dataHelper = $dataHelper;
        return parent::__construct($context);
    }

    public function execute()
    {
//        $posts = $this->_postsFactory->create();
//        $collection = $posts->getCollection();
//        foreach ($collection as $item) {
//
//            print_r($item->getData());
//
//        }
//        return $this->_pageFactory->create();

        echo "Get Data From magetop_blog table";
        $posts = $this->_postsFactory->create();
        $collection = $posts->getCollection();
        foreach ($collection as $item) {
            echo '<pre>';
            print_r($item->getData());
            echo '<pre>';
        }

        echo "<br>========== Check date, helper function ======== <br>";
        $date = '2020-11-15';
        if ($this->_dataHelper->checkDate($date)) {
            echo "Yes, {$date} is Sunday , I can go to your home <br>";
        } else {
            echo "Yes, {$date} is not Sunday , I was to busy <br>";
        }

        echo "<br>========== Get value Config, helper function ======== <br>";
        echo $this->_dataHelper->getGeneralConfig('enable') . " - " . $this->_dataHelper->getGeneralConfig('number_posts');
    }
}
