<?php
namespace Rojas\ProductTrafficLight\Setup;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{

    public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        if (!$installer->tableExists('test_catalog_product_semaforo')) {
            $table = $installer->getConnection()->newTable(
                $installer->getTable('test_catalog_product_semaforo')
            )
                ->addColumn(
                    'id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'nullable' => false,
                        'primary'  => true,
                        'unsigned' => true,
                    ],
                    'ID'
                )
                ->addColumn(
                    'sku',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    64,
                    ['nullable => false'],
                    'SKU'
                )
                ->addColumn(
                    'color_semaforo',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    100,
                    [],
                    'Color semaforo'
                )
                ->setComment('Test Catalog Product Semaforo Table');
            $installer->getConnection()->createTable($table);

            $installer->getConnection()->addIndex(
                $installer->getTable('test_catalog_product_semaforo'),
                $setup->getIdxName(
                    $installer->getTable('test_catalog_product_semaforo'),
                    ['sku','color_semaforo'],
                    \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
                ),
                ['sku','color_semaforo'],
                \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
            );
        }
        $installer->endSetup();
    }
}
