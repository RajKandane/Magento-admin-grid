<?php
namespace Custom\Teams\Model;
class Post extends \Magento\Framework\Model\AbstractModel
{
	protected function _construct()
	{
		$this->_init('Custom\Teams\Model\ResourceModel\Post');
	}
}
