<?php
namespace Custom\Member\Setup;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{

	public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
	{
		/** custom_member_post is the table name **/
		$installer = $setup;
		$installer->startSetup();
		if (!$installer->tableExists('custom_member_post')) {
			$table = $installer->getConnection()->newTable(
				$installer->getTable('custom_member_post')
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
					'name',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					255,
					['nullable => false'],
					'Post Name'
				)
				->addColumn(
					'department',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					255,
					['nullable => false'],
					'Post Department'
				)
				// ->addColumn(
				// 	'photo',
				// 	Table::TYPE_BLOB,
				// 	null,
				// 	['nullable' => true],
				// 	'Post Photo'
				// )
				->addColumn(
					'title',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					255,
					['nullable => false'],
					'Post Title'
				)
				->addColumn(
					'quotes',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					255,
					['nullable => false'],
					'Post Quotes'
				)				
				->setComment('Post Table');
			$installer->getConnection()->createTable($table);

			$installer->getConnection()->addIndex(
				$installer->getTable('custom_member_post'),
				$setup->getIdxName(
					$installer->getTable('custom_member_post'),
					['name', 'department', 'photo', 'title', 'quotes'],
					\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
				),
				['name', 'department', 'photo', 'title', 'quotes'],
				\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
			);
		}
		$installer->endSetup();
	}
}
?>