<?php
namespace Custom\Member\Model;
class Post extends \Magento\Framework\Model\AbstractModel
{
	protected function _construct()
	{
		$this->_init('Custom\Member\Model\ResourceModel\Post');
	}
}
