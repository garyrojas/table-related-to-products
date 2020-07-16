<?php
namespace Rojas\ProductTrafficLight\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $pageFactory;
    protected $testCatalogProductSemaforoFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Rojas\ProductTrafficLight\Model\TestCatalogProductSemaforoFactory $testCatalogProductSemaforoFactory
    )
    {
        $this->pageFactory = $pageFactory;
        $this->testCatalogProductSemaforoFactory = $testCatalogProductSemaforoFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $testCatalogProductSemaforoFactory = $this->testCatalogProductSemaforoFactory->create();
        $collection = $testCatalogProductSemaforoFactory->getCollection();
        foreach($collection as $item){
            echo "<pre>";
            print_r($item->getData());
            echo "</pre>";
        }
        /*
         * $collection = $testCatalogProductSemaforoFactory->setSku("SKU-123");
         * $collection = $testCatalogProductSemaforoFactory->setColorSemaforo("#ADASDSAD");
         * $collection->save();
         */
        exit();
        return $this->pageFactory->create();
    }
}
