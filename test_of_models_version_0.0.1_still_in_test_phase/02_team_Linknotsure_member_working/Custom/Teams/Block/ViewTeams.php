<?php

namespace Custom\Teams\Block;

Class ViewTeams extends \Magento\Framework\View\Element\Template
{
	protected $allTeamsFactory;
	
	public function __construct(
		\Magento\Framework\View\Element\Template\Context $context,
		\Custom\Teams\Model\AllteamsFactory $allTeamsFactory
	){
		parent::__construct($context);
		$this->allTeamsFactory = $allTeamsFactory;
	}
	
	public function getTeams()
	{
		$id = $this->getRequest()->getParam('id');
		$teams = $this->allTeamsFactory->create()->load($id);
		
		return $teams;
	}
	
	protected function _prepareLayout(){
		
		parent::_prepareLayout();
		
		$teams = $this->getTeams();
		$this->pageConfig->getTitle()->set($teams->getTitle());
		
        return $this;
	}
}