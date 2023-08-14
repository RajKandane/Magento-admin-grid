<?php

namespace Custom\Teams\Controller\Adminhtml\Post;

class Massdelete extends \Magento\Backend\App\Action
{
	protected $resultPageFactory = false;

	public function __construct(
		\Magento\Backend\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $resultPageFactory
	)
	{
		parent::__construct($context);
		$this->resultPageFactory = $resultPageFactory;
	}

	public function execute()
	{
		echo "delete here"; exit;
		$resultPage = $this->resultPageFactory->create();
		$resultPage->getConfig()->getTitle()->prepend((__('Manage Teams')));

		return $resultPage;
	}


}