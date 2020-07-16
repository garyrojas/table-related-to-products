<?php
namespace Rojas\ProductTrafficLight\Model;
class TestCatalogProductSemaforo extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'test_catalog_product_semaforo';

    protected $_cacheTag = 'test_catalog_product_semaforo';

    protected $_eventPrefix = 'test_catalog_product_semaforo';

    protected function _construct()
    {
        $this->_init('Rojas\ProductTrafficLight\Model\ResourceModel\TestCatalogProductSemaforo');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}
