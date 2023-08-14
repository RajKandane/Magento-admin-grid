<?php
namespace Custom\Teams\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    
  public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
  {
      
    $teamsTableName = $setup->getTable('custom_teams');

    if($setup->getConnection()->isTableExists($teamsTableName) != true) {

      $teamsTable = $setup->getConnection()
          ->newTable($teamsTableName)
          ->addColumn(
              'teams_id',
              \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
              null,
              ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
              'Teams ID'
          )
          ->addColumn(
              'department_name',
              \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
              255,
              ['nullable' => false, 'default' => ''],
                'Department Name'
          )
          ->addColumn(
              'created_by',
              \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
              255,
              ['nullable' => false, 'default' => ''],
                'Created By'
          )
          ->addColumn(
              'created_at',
              \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
              null,
              ['nullable' => false],
                'Created At'
          )
          ->addColumn(
            'updated_by',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false, 'default' => ''],
              'Updated By'
        )
          ->addColumn(
              'updated_at',
              \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
              null,
              ['nullable' => false],
                'Updated At'
          )
          ->addIndex(
            $setup->getIdxName('custom_teams', ['department_name']),
            ['department_name']
          )
          ->setComment("Teams Table");

      $setup->getConnection()->createTable($teamsTable);
    }
  }
}
?>