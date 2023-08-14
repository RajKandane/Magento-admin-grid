<?php
namespace MyCompany\Teams\Block\Adminhtml\Team;

use Magento\Backend\Block\Widget\Form\Container;

class Edit extends Container
{
    protected function _construct()
    {
        $this->_objectId = 'team_id';
        $this->_blockGroup = 'MyCompany_Teams';
        $this->_controller = 'adminhtml_team';
        
        parent::_construct();
        
        if ($this->_isAllowedAction('MyCompany_Teams::team_save')) {
            $this->buttonList->update('save', 'label', __('Save Team'));
            $this->buttonList->add(
                'saveandcontinue',
                [
                    'label' => __('Save and Continue Edit'),
                    'class' => 'save',
                    'data_attribute' => [
                        'mage-init' => ['button' => ['event' => 'saveAndContinueEdit', 'target' => '#edit_form']],
                    ],
                ],
                -100
            );
        } else {
            $this->buttonList->remove('save');
        }
    }

    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }
}
