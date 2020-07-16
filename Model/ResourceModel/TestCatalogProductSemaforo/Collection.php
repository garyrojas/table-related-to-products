<?php
namespace Rojas\ProductTrafficLight\Model\ResourceModel\TestCatalogProductSemaforo;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';
    protected $_eventPrefix = 'test_catalog_product_semaforo_collection';
    protected $_eventObject = 'test_catalog_product_semaforo_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Rojas\ProductTrafficLight\Model\TestCatalogProductSemaforo', 'Rojas\ProductTrafficLight\Model\ResourceModel\TestCatalogProductSemaforo');
    }

}
