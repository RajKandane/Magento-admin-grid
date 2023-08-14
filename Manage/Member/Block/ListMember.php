<?php

namespace Manage\Member\Block;

Class ListMember extends \Magento\Framework\View\Element\Template
{
	protected $allMemberFactory;
	
	public function __construct(
		\Magento\Framework\View\Element\Template\Context $context,
		\Manage\Member\Model\AllmemberFactory $allMemberFactory
	){
		parent::__construct($context);
		$this->allMemberFactory = $allMemberFactory;
	}
	
	public function getBaseUrl()
	{
		return $this->_storeManager->getStore()->getBaseUrl();
	}
	
	public function getListMember()
	{
		$page = ($this->getRequest()->getParam('p'))? $this->getRequest()->getParam('p') : 1;
		$limit = ($this->getRequest()->getParam('limit'))? $this->getRequest()->getParam('limit') : 2;
		
		$collection = $this->allMemberFactory->create()->getCollection();
		$collection->addFieldToFilter('status',1);
		$collection->setPageSize($limit);
		$collection->setCurPage($page);
	
		return $collection;
	}
	
	protected function _prepareLayout(){
		parent::_prepareLayout();
		$this->pageConfig->getTitle()->set(__('Latest Member'));
		
		if ($this->getListMember()){
			$pager = $this->getLayout()->createBlock('Magento\Theme\Block\Html\Pager', 'manage.member.pager')
									->setAvailableLimit(array(2=>2,10=>10,15=>15,20=>20))
									->setShowPerPage(true)
									->setCollection($this->getListMember());

			$this->setChild('pager', $pager);

			$this->getListMember()->load();
		}
        return $this;
	}
	
	public function getPagerHtml()
	{
		return $this->getChildHtml('pager');
	}
}