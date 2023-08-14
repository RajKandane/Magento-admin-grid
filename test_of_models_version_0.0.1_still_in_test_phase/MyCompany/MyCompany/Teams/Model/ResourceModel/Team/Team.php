<?php
namespace MyCompany\Teams\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Team extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('mycompany_teams_teams', 'team_id');
    }

    protected function _initRelations()
    {
        $this->addRelation(
            'members',
            \MyCompany\Teams\Model\ResourceModel\Member::class,
            'team_id',
            \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
        );
    }
}





