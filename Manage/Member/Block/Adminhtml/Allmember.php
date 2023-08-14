<?php
namespace Manage\Member\Block\Adminhtml;

class Allmember extends \Magento\Backend\Block\Widget\Grid\Container
{
    protected function _construct()
    {
        $this->_controller = 'adminhtml_allmember';
        $this->_blockGroup = 'Manage_Member';
        $this->_headerText = __('Manage Member');

        parent::_construct();

        if ($this->_isAllowedAction('Manage_Member::save')) {
            $this->buttonList->update('add', 'label', __('Add Member'));
        } else {
            $this->buttonList->remove('add');
        }
    }

    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }
}
