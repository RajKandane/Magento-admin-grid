<?php
namespace Custom\Teams\Setup;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{

	public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
	{
		/** custom_teams_post is the table name **/
		$installer = $setup;
		$installer->startSetup();
		if (!$installer->tableExists('custom_teams_post')) {
			$table = $installer->getConnection()->newTable(
				$installer->getTable('custom_teams_post')
			)
				->addColumn(
					'post_id',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					null,
					[
						'identity' => true,
						'nullable' => false,
						'primary'  => true,
						'unsigned' => true,
					],
					'Post ID'
				)
				->addColumn(
					'department_name',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					255,
					['nullable => false'],
					'Post Department Name'
				)
				->addColumn(
					'created_by',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					255,
					[],
					'Post Created By'
				)
				->addColumn(
					'created_at',
					\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
					null,
					['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
					'Created At'
				)
				->addColumn(
					'updated_by',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					255,
					[],
					'Post Updated By'
				)
				->addColumn(
					'updated_at',
					\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
					null,
					['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
					'Updated At')
				->setComment('Post Table');
			$installer->getConnection()->createTable($table);

			$installer->getConnection()->addIndex(
				$installer->getTable('custom_teams_post'),
				$setup->getIdxName(
					$installer->getTable('custom_teams_post'),
					['department_name', 'created_by', 'created_at', 'updated_by', 'updated_at'],
					\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
				),
				['department_name', 'created_by', 'created_at', 'updated_by', 'updated_at'],
				\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
			);
		}
		$installer->endSetup();
	}
}
?>