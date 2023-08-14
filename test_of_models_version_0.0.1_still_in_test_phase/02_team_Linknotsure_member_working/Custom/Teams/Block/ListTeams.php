<?php

namespace Custom\Teams\Block;

Class ListTeams extends \Magento\Framework\View\Element\Template
{
	protected $allTeamsFactory;
	
	public function __construct(
		\Magento\Framework\View\Element\Template\Context $context,
		\Custom\Teams\Model\AllteamsFactory $allTeamsFactory
	){
		parent::__construct($context);
		$this->allTeamsFactory = $allTeamsFactory;
	}
	
	public function getBaseUrl()
	{
		return $this->_storeManager->getStore()->getBaseUrl();
	}
	
	public function getListTeams()
	{
		$page = ($this->getRequest()->getParam('p'))? $this->getRequest()->getParam('p') : 1;
		$limit = ($this->getRequest()->getParam('limit'))? $this->getRequest()->getParam('limit') : 2;
		
		$collection = $this->allTeamsFactory->create()->getCollection();
		$collection->addFieldToFilter('status',1);
		$collection->setPageSize($limit);
		$collection->setCurPage($page);
	
		return $collection;
	}
	
	protected function _prepareLayout(){
		parent::_prepareLayout();
		$this->pageConfig->getTitle()->set(__('Latest Teams'));
		
		if ($this->getListTeams()){
			$pager = $this->getLayout()->createBlock('Magento\Theme\Block\Html\Pager', 'custom.teams.pager')
									->setAvailableLimit(array(2=>2,10=>10,15=>15,20=>20))
									->setShowPerPage(true)
									->setCollection($this->getListTeams());

			$this->setChild('pager', $pager);

			$this->getListTeams()->load();
		}
        return $this;
	}
	
	public function getPagerHtml()
	{
		return $this->getChildHtml('pager');
	}
}