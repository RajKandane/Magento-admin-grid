<?php
namespace MyCompany\Teams\Block\Adminhtml\Member;

use Magento\Backend\Block\Widget\Form\Container;

class Edit extends Container
{
    protected function _construct()
    {
        $this->_objectId = 'member_id';
        $this->_blockGroup = 'MyCompany_Teams';
        $this->_controller = 'adminhtml_member';
        
        parent::_construct();
        
        if ($this->_isAllowedAction('MyCompany_Teams::member_save')) {
            $this->buttonList->update('save', 'label', __('Save Member'));
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
