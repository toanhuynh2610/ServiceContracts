<?php

namespace Magenest\Extensible\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

/**
 * Class InstallSchema
 *
 * @package Magenest\Repository\Setup
 */
class InstallSchema implements InstallSchemaInterface
{
	/**
	 * @param SchemaSetupInterface $setup
	 * @param ModuleContextInterface $context
	 */
	public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
	{
		$this->createTable($setup);
	}

	/**
	 * @param SchemaSetupInterface $setup
	 * @throws \Zend_Db_Exception
	 */
	protected function createTable(SchemaSetupInterface $setup)
	{
		$installer     = $setup;
		$connection    = $installer->getConnection();
		$directorTable = $connection->getTableName('magenest_director');
		if ($connection->isTableExists($directorTable)) {
			$connection->addColumn(
				$installer->getTable('magenest_director'),
				'award_type',
				[
					'type'     => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					'length'   => 255,
					'comment'  => 'Award Type',
					'nullable' => true,
					'default'  => 'No award'
				]
			);
		}
		$installer->endSetup();
	}
}