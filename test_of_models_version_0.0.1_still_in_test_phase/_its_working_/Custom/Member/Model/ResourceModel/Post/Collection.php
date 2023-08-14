<?php
namespace Custom\Member\Model\ResourceModel\Post;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Custom\Member\Model\Post', 'Custom\Member\Model\ResourceModel\Post');
	}

}