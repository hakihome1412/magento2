<?php
namespace Magetop\Helloworld\Block\Adminhtml\Posts\Edit\Tab;

use Magento\Backend\Block\Template\Context;
use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;
use Magento\Cms\Model\Wysiwyg\Config;
use Magento\Framework\Data\FormFactory;
use Magento\Framework\Registry;
use Magetop\Helloworld\Model\System\Config\Status;

class Info extends Generic implements TabInterface
{
    protected $_wysiwygConfig;
    protected $_status;

    public function __construct(Context $context, Registry $registry, FormFactory $formFactory, Config $wysiwygConfig, Status $status, $data = [])
    {
        $this->_wysiwygConfig = $wysiwygConfig;
        $this->_status = $status;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Prepare form fields
     *
     * @return \Magento\Backend\Block\Widget\Form
     */
    protected function _prepareForm()
    {
        /** @var $model \Magetop\Helloworld\Model\PostsFactory */
        $model = $this->_coreRegistry->registry('magetop_blog');

        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();
        $form->setHtmlIdPrefix('post_');
        $form->setFieldNameSuffix('post');
        // new filed

        $fieldset = $form->addFieldset(
            'base_fieldset',
            ['legend' => __('General')]
        );

        if ($model->getId()) {
            $fieldset->addField(
                'id',
                'hidden',
                ['name' => 'id']
            );
        }
        $fieldset->addField(
            'title',
            'text',
            [
                'name'      => 'title',
                'label'     => __('Title'),
                'title' => __('Title'),
                'required' => true
            ]
        );
        $fieldset->addField(
            'image',
            'text',
            [
                'name'      => 'image',
                'label'     => __('Image'),
                'title' => __('Image'),
            ]
        );
        $fieldset->addField(
            'status',
            'select',
            [
                'name'      => 'status',
                'label'     => __('Status'),
                'options'   => $this->_status->toOptionArray()
            ]
        );
        $fieldset->addField('description', 'editor', [
            'name'      => 'description',
            'label'   => 'Description',
            'config'    => $this->_wysiwygConfig->getConfig(),
            'wysiwyg'   => true,
            'required'  => false
        ]);
        $data = $model->getData();
        $form->setValues($data);
        $this->setForm($form);

        return parent::_prepareForm();
    }

    public function getTabLabel()
    {
        return __('Posts Info');
    }

    public function getTabTitle()
    {
        return __('Posts Info');
    }

    public function canShowTab()
    {
        return true;
    }

    public function isHidden()
    {
        return false;
    }
}
