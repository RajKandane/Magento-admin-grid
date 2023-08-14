<?php
namespace MyCompany\Teams\Block\Frontend;

use Magento\Framework\View\Element\Template;
use MyCompany\Teams\Model\ResourceModel\Member\CollectionFactory as MemberCollectionFactory;

class Team extends Template
{
    protected $memberCollectionFactory;

    public function __construct(
        Template\Context $context,
        MemberCollectionFactory $memberCollectionFactory,
        array $data = []
    ) {
        $this->memberCollectionFactory = $memberCollectionFactory;
        parent::__construct($context, $data);
    }

    public function getTabContent($tabId)
    {
        $memberCollection = $this->memberCollectionFactory->create();
        $memberCollection->addFieldToFilter('department', $tabId); // Replace with your actual field name for department
        $html = '<div class="tab-content" id="tab-content-' . $tabId . '">';
        foreach ($memberCollection as $member) {
            $html .= '<div class="member">';
            $html .= '<h3>' . $member->getName() . '</h3>';
            $html .= '<p>' . $member->getTitle() . '</p>';
            $html .= '<img src="' . $member->getPhotoUrl() . '" alt="' . $member->getName() . '">';
            $html .= '<blockquote>' . $member->getQuotes() . '</blockquote>';
            $html .= '</div>';
        }
        $html .= '</div>';
        return $html;
    }
}
