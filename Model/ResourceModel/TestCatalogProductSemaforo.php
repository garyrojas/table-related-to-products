<?php
namespace Rojas\ProductTrafficLight\Model\ResourceModel;


class TestCatalogProductSemaforo extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    )
    {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init('test_catalog_product_semaforo', 'id');
    }

}
