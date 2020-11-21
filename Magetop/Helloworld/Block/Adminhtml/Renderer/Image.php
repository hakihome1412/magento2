<?php

namespace Magetop\Helloworld\Block\Adminhtml\Renderer;

use Magento\Backend\Block\Context;
use Magento\Backend\Block\Widget\Grid\Column\Renderer\AbstractRenderer;
use Magento\Framework\DataObject;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\UrlInterface;

class Image extends AbstractRenderer
{
    protected $storeManager;
    public function __construct(Context $context, StoreManagerInterface $storeManager, $data = [])
    {
        parent::__construct($context, $data);
        $this->storeManager = $storeManager;
    }
    public function render(DataObject $row)
    {
        $image = $this->_getValue($row);
        $mediaUrl = $this->storeManager->getStore()->getBaseUrl(UrlInterface::URL_TYPE_MEDIA);
        $strImage = '<img width="100" height="100" src="' . $mediaUrl . 'helloworld/images/' . $image . '" />';

        return $strImage;
    }
}
