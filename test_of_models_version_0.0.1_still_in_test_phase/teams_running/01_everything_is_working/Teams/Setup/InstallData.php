<?php

namespace Custom\Teams\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    protected $date;
 
    public function __construct(
        \Magento\Framework\Stdlib\DateTime\DateTime $date
    ) {
        $this->date = $date;
    }
    
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $dataTeamsRows = [
            [
                'department_name' => 'Development and Security',
                'created_by' => 'Development Manager',
                'created_at' => $this->date->date(),
                'updated_by' => 'Development Manager',
                'updated_at' => $this->date->date()
            ],
            [
                'department_name' => 'Marketing',
                'created_by' => 'Marketing Team Head',
                'created_at' => $this->date->date(),
                'updated_by' => 'Marketing Team Head',
                'updated_at' => $this->date->date()
                
            ]
        ];
        
        foreach($dataTeamsRows as $data) {
            $setup->getConnection()->insert($setup->getTable('custom_teams'), $data);
        }
    }
}
?>