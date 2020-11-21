<?php
namespace Magetop\Helloworld\Block\Adminhtml\Import;

use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Data\Form\FormKey;
use Magento\Framework\View\Element\Template;

class Index extends Template
{
    protected $formKey;
    public function __construct(Context $context, FormKey $formKey, $data = [])
    {
        $this->formKey = $formKey;
        parent::__construct($context, $data);
    }
    public function getFormKey()
    {
        return $this->formKey->getFormKey();
    }
}
