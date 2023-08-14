<?php

namespace Custom\Teams\Block;

Class LinkTeams extends \Magento\Framework\View\Element\Template
{
	protected $dataHelper;
	
	public function __construct(
		\Magento\Framework\View\Element\Template\Context $context,
		\Custom\Teams\Helper\Data $dataHelper
	){
		parent::__construct($context);
		$this->dataHelper = $dataHelper;
	}
	
	public function getTeamsLink()
	{
		$teamsLink = $this->dataHelper->getStorefrontConfig('teams_link');
		
		return $teamsLink;
	}
	
	public function getBaseUrl()
	{
		return $this->_storeManager->getStore()->getBaseUrl();
	}
}