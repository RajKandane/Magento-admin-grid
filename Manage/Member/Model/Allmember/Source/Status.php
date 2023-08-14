<?php

namespace Manage\Member\Model\Allmember\Source;

use Magento\Framework\Data\OptionSourceInterface;

class Status implements OptionSourceInterface
{
    protected $allMember;

    public function __construct(\Manage\Member\Model\Allmember $allMember)
    {
        $this->allMember = $allMember;
    }

    public function toOptionArray()
    {
        $availableOptions = $this->allMember->getAvailableStatuses();
        $options = [];
        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }
        return $options;
    }
}
