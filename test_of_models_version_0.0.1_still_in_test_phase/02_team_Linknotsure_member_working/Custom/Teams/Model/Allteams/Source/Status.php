<?php

namespace Custom\Teams\Model\Allteams\Source;

use Magento\Framework\Data\OptionSourceInterface;

class Status implements OptionSourceInterface
{
    protected $allTeams;

    public function __construct(\Custom\Teams\Model\Allteams $allTeams)
    {
        $this->allTeams = $allTeams;
    }

    public function toOptionArray()
    {
        $availableOptions = $this->allTeams->getAvailableStatuses();
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
