<?php
namespace Magetop\Helloworld\Model\ResourceModel\Import;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            'Magetop\Helloworld\Model\Import',
            'Magetop\Helloworld\Model\ResourceModel\Import'
        );
    }
}
