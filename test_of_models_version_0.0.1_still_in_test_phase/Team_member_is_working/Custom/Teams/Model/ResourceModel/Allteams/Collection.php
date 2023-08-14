<?php
namespace Custom\Teams\Model\ResourceModel\Allteams;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'teams_id';
	
	protected $_eventPrefix = 'teams_allteams_collection';

    protected $_eventObject = 'allteams_collection';
	
	/**
     * Define model & resource model
     */
	protected function _construct()
	{
		$this->_init('Custom\Teams\Model\Allteams', 'Custom\Teams\Model\ResourceModel\Allteams');
	}
}
?>