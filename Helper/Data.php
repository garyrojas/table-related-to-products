<?php
namespace Rojas\ProductTrafficLight\Helper;

/**
 * Data helper
 */
class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    protected $testCatalogProductSemaforoFactory;
    protected $trafficLightService;

    /**
     * Construct
     *
     * @param \Magento\Framework\App\Helper\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $pageFactory
     * @param \Rojas\ProductTrafficLight\Model\TestCatalogProductSemaforoFactory $testCatalogProductSemaforoFactory
     * @param \Rojas\ProductTrafficLight\Services\TrafficLightService $trafficLightService
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Rojas\ProductTrafficLight\Model\TestCatalogProductSemaforoFactory $testCatalogProductSemaforoFactory,
        \Rojas\ProductTrafficLight\Services\TrafficLightService $trafficLightService
    )
    {
        $this->testCatalogProductSemaforoFactory = $testCatalogProductSemaforoFactory;
        $this->trafficLightService = $trafficLightService;
        parent::__construct($context);
    }

    /**
     * Set Semaforo
     *
     * @return  array
     */
    public function semaforo($sku, $color)
    {
        $success = false;
        $success = $this->saveParams($sku, $color);
        if(!$success) {
            $success = $this->save();
        }
        return $success;
    }

    public function save()
    {
        $success = false;
        $trafficLightService = $this->trafficLightService->getData();
        foreach($trafficLightService as $data) {
            if(isset($data['sku']) and isset($data['color_semaforo'])) {
                if($data['sku'] and $data['color_semaforo']) {
                    $testCatalogProductSemaforoFactory = $this->testCatalogProductSemaforoFactory->create();
                    $testCatalogProductSemaforoFactory->setSku($data['sku']);
                    $testCatalogProductSemaforoFactory->setColorSemaforo($data['color_semaforo']);
                    $testCatalogProductSemaforoFactory->save();
                    $success = true;
                }
            }
        }
        return $success;
    }

    public function saveParams($sku, $color)
    {
        if($sku != "" && $color != "") {
            $testCatalogProductSemaforoFactory = $this->testCatalogProductSemaforoFactory->create();
            $testCatalogProductSemaforoFactory->setSku($sku);
            $testCatalogProductSemaforoFactory->setColorSemaforo($color);
            $testCatalogProductSemaforoFactory->save();
            return true;
        }
        return false;
    }
}
