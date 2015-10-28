<?php

/**
 * @package Magma
 * @category Magma_Slider
 * @author Tadeo Barranco <jose.barranco@magmalabs.io>
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 *
 *
 * 
 * $installer is a variable assigned with the pseudo variable $this value
 * @var [type]
 */
$installer = $this;

/**
 * Start setup step
 */
$installer->startSetup();

/**
 * Looking for existing slider tables, if exist this will drop it at first time that this code run.
 */
if($installer->getConnection()->isTableExists($installer->getTable('slider/slider'))) {
	$installer->getConnection()->dropTable($installer->getTable('slider/slider'));
}

if($installer->getConnection()->isTableExists($installer->getTable('slider/options'))) {
	$installer->getConnection()->dropTable($installer->getTable('slider/options'));
}

if($installer->getConnection()->isTableExists($installer->getTable('slider/gallery'))) {
	$installer->getConnection()->dropTable($installer->getTable('slider/gallery'));
}

/**
 * [$table description]
 * @var [type]
 */
$table = $installer->getConnection()
			->newTable($installer->getTable('slider/slider'))
			->addColumn('id', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
				'identity' => true,
				'nullable' => false,
				'primary' => true,
			), 'Slider id')
			->addColumn('title', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
				'nullable' => false,
			), 'Slider title')
			->addColumn('identifier', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
				'nullable' => false,
			), 'Slider identifier')
			->addColumn('is_active', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
				'nullable' => false,
				'default' => '1',	
			), 'Slider is active')
			->setComment('Slider table');


/**
 * Ending setup step
 */
$installer->endSetup();