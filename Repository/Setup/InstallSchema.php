<?php

namespace Magenest\Repository\Setup;

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
		$installer = $setup;
		$installer->startSetup();
		/*CREATE MAGENEST_DIRECTOR*/
		$table = $installer->getConnection()->newTable(
			$installer->getTable('magenest_director')
		)->addColumn(
			'director_id',
			\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
			null, [
			'identity' => true,
			'unsigned' => true,
			'nullable' => false,
			'primary'  => true],
			'DirectorID'
		)->addColumn(
			'name',
			\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
			255,
			[],
			'Name'
		)->addColumn(
			'age',
			\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
			null,
			[],
			'Age'
		)->addColumn(
			'mobile',
			\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
			255,
			[],
			'Mobile'
		)
			->setComment(
				'Custom Table'
			);
		$installer->getConnection()->createTable($table);

		$installer->endSetup();
	}
}