<?php
namespace Magetop\Helloworld\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magetop\Helloworld\Model\PostsFactory;

class Posts extends Template
{
    protected $_postsFactory;

    public function __construct(Context $context, PostsFactory $postsFactory)
    {
        $this->_postsFactory = $postsFactory;
        parent::__construct($context);
    }


    public function getPostItems()
    {
        $posts = $this->_postsFactory->create();

        return $posts->getCollection();
    }

}
