<?php
namespace Custom\Teams\Model\ResourceModel\Post;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Custom\Teams\Model\Post', 'Custom\Teams\Model\ResourceModel\Post');
	}

}