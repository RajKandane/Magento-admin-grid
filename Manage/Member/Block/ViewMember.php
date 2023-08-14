<?php

namespace Manage\Member\Block;

Class ViewMember extends \Magento\Framework\View\Element\Template
{
	protected $allMemberFactory;
	
	public function __construct(
		\Magento\Framework\View\Element\Template\Context $context,
		\Manage\Member\Model\AllmemberFactory $allMemberFactory
	){
		parent::__construct($context);
		$this->allMemberFactory = $allMemberFactory;
	}
	
	public function getMember()
	{
		$id = $this->getRequest()->getParam('id');
		$member = $this->allMemberFactory->create()->load($id);
		
		return $member;
	}
	
	protected function _prepareLayout(){
		
		parent::_prepareLayout();
		
		$member = $this->getMember();
		$this->pageConfig->getTitle()->set($member->getTitle());
		
        return $this;
	}
}