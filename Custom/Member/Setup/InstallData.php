<?php

namespace Custom\Member\Setup;

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
        $dataMemberRows = [
            [
                'name' => 'Demo_test01',
                'department' => 'Technical',
                'photo' => '',
                // 'photo' => $this->date->date(),
                'title' => 'Development Project team leader',
                'quotes' => 'hey ! YO'
            ],
            [
                'name' => 'Demo_test02',
                'department' => 'Testing',
                'photo' => '',
                // 'photo' => $this->date->date(),
                'title' => 'Tester',
                'quotes' => 'hey, I like coding'
                
            ]
        ];
        
        foreach($dataMemberRows as $data) {
            $setup->getConnection()->insert($setup->getTable('custom_member'), $data);
        }
    }
}
?>