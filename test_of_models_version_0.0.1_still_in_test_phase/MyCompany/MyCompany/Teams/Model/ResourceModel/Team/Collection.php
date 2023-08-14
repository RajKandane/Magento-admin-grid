<?php
namespace MyCompany\Teams\Model\ResourceModel\Team;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            \MyCompany\Teams\Model\Team::class,
            \MyCompany\Teams\Model\ResourceModel\Team::class
        );
    }
}
