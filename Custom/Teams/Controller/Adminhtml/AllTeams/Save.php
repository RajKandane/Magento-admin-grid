<?php

namespace Custom\Teams\Controller\Adminhtml\Allteams;

use Magento\Backend\App\Action;
use Custom\Teams\Model\Allteams;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Exception\LocalizedException;

class Save extends \Magento\Backend\App\Action
{
    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;

    /**
     * @var \Custom\Teams\Model\AllteamsFactory
     */
    private $allteamsFactory;

    /**
     * @var \Custom\Teams\Api\AllteamsRepositoryInterface
     */
    private $allteamsRepository;

    /**
     * @param Action\Context $context
     * @param DataPersistorInterface $dataPersistor
     * @param \Custom\Teams\Model\AllteamsFactory $allteamsFactory
     * @param \Custom\Teams\Api\AllteamsRepositoryInterface $allteamsRepository
     */
    public function __construct(
        Action\Context $context,
        DataPersistorInterface $dataPersistor,
        \Custom\Teams\Model\AllteamsFactory $allteamsFactory = null,
        \Custom\Teams\Api\AllteamsRepositoryInterface $allteamsRepository = null
    ) {
        $this->dataPersistor = $dataPersistor;
        $this->allteamsFactory = $allteamsFactory
            ?: \Magento\Framework\App\ObjectManager::getInstance()->get(\Custom\Teams\Model\AllteamsFactory::class);
        $this->allteamsRepository = $allteamsRepository
            ?: \Magento\Framework\App\ObjectManager::getInstance()->get(\Custom\Teams\Api\AllteamsRepositoryInterface::class);
        parent::__construct($context);
    }
	
	/**
     * Authorization level
     *
     * @see _isAllowed()
     */
	protected function _isAllowed()
	{
		return $this->_authorization->isAllowed('Custom_Teams::save');
	}

    /**
     * Save action
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data) {
            if (isset($data['status']) && $data['status'] === 'true') {
                $data['status'] = Allteams::STATUS_ENABLED;
            }
            if (empty($data['teams_id'])) {
                $data['teams_id'] = null;
            }

            /** @var \Custom\Teams\Model\Allteams $model */
            $model = $this->allteamsFactory->create();

            $id = $this->getRequest()->getParam('teams_id');
            if ($id) {
                try {
                    $model = $this->allteamsRepository->getById($id);
                } catch (LocalizedException $e) {
                    $this->messageManager->addErrorMessage(__('This teams no longer exists.'));
                    return $resultRedirect->setPath('*/*/');
                }
            }

            $model->setData($data);

            $this->_eventManager->dispatch(
                'teams_allteams_prepare_save',
                ['allteams' => $model, 'request' => $this->getRequest()]
            );

            try {
                $this->allteamsRepository->save($model);
                $this->messageManager->addSuccessMessage(__('You saved the teams.'));
                $this->dataPersistor->clear('teams_allteams');
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['teams_id' => $model->getId(), '_current' => true]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addExceptionMessage($e->getPrevious() ?:$e);
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the teams.'));
            }

            $this->dataPersistor->set('teams_allteams', $data);
            return $resultRedirect->setPath('*/*/edit', ['teams_id' => $this->getRequest()->getParam('teams_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}
