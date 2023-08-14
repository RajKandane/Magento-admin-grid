<?php
namespace MyCompany\Teams\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Member extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('mycompany_teams_members', 'member_id');
    }

    protected function _initRelations()
    {
        // Add a relationship if needed for Member entity
        /*
            The relationship definition you added in the Team.php resource model (MyCompany\Teams\Model\ResourceModel\Team) is sufficient for defining the one-to-many relationship between Team and Member.
            we do not need to add a relationship definition for Member within its own resource model in this specific case.
        */
    }
}
