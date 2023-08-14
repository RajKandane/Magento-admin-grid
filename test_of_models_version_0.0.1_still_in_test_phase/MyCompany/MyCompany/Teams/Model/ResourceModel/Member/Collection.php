<?php
namespace MyCompany\Teams\Model\ResourceModel\Member;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            \MyCompany\Teams\Model\Member::class,
            \MyCompany\Teams\Model\ResourceModel\Member::class
        );
    }
}
