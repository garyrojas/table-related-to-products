<?php
namespace Rojas\ProductTrafficLight\Services;
/*
use Rojas\ProductTrafficLight\Logger\Logger;
*/
class TrafficLightService
{
    public function getData()
    {
        $data[0]['sku'] = 'SKU-11111';
        $data[0]['color_semaforo'] = '#AAAAAAA';

        $data[1]['sku'] = 'SKU-2222';
        $data[1]['color_semaforo'] = '#BBBBBB';

        $data[1]['sku'] = 'SKU-2222';
        $data[1]['color_semaforo'] = '#BBBBBB';

        return $data;
    }
}
