<?php
namespace Magetop\Helloworld\Model;

use Magento\Framework\Model\AbstractModel;

class Import extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('Magetop\Helloworld\Model\ResourceModel\Import');
    }
}
