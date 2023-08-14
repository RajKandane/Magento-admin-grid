<?php

namespace Manage\Member\Block;

Class LinkMember extends \Magento\Framework\View\Element\Template
{
	protected $dataHelper;
	
	public function __construct(
		\Magento\Framework\View\Element\Template\Context $context,
		\Manage\Member\Helper\Data $dataHelper
	){
		parent::__construct($context);
		$this->dataHelper = $dataHelper;
	}
	
	public function getMemberLink()
	{
		$memberLink = $this->dataHelper->getStorefrontConfig('member_link');
		
		return $memberLink;
	}
	
	public function getBaseUrl()
	{
		return $this->_storeManager->getStore()->getBaseUrl();
	}
}