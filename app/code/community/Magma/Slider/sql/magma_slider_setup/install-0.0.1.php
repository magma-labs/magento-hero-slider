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
$installer->getConnection()->createTable($table);

/**
 * [$table description]
 * @var [type]
 */
$table = $installer->getConnection()
			->newTable($installer->getTable('slider/options'))
			->addColumn('id', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
				'identity' => true,
				'nullable' => false,
				'primary' => true,
			), 'Slider Options id')
			->addColumn('slider_id', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
				'nullable' => false,
			), 'Slider id')
			->addColumn('mode', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
				'nullable' => false,
				'default' => 'horizontal',
			), 'Slider mode')
			->addColumn('speed', Varien_Db_Ddl_Table::TYPE_INTEGER, 11, array(
				'nullable' => false,
				'default' => 500,	
			), 'Slide changes speed')
			->addColumn('start_slide', Varien_Db_Ddl_Table::TYPE_INTEGER, 11, array(
				'nullable' => false,
				'default' => '0',
			), 'Slide to start slider')
			->addColumn('random_start', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
				'nullable' => false,
				'default' => '0',
			), 'Is slider random start')
			->addColumn('infinite_loop', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
				'nullable' => false,
				'default' => '1',
			), 'Is slider infinite loop')
			->addColumn('hide_control_on_end', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
				'nullable' => false,
				'default' => '0',
			), 'Hide control navigation in the last item')
			->addColumn('video', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
				'nullable' => false,
				'default' => '0',
			), 'Any sluider include video')
			->addColumn('responsive', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
				'nullable' => false,
				'default' => '1',
			), 'Is responsive slider')
			->setComment('Slider options');
$installer->getConnection()->createTable($table);

/**
 * Ending setup step
 */
$installer->endSetup();