<?php


namespace Magetop\Helloworld\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Import extends AbstractDb
{
    protected function _construct()
    {
        // customer_entity is table name and entity_id is Primary of Table
        $this->_init('customer_entity', 'entity_id');
    }
}
