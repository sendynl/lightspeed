<?php

namespace Lightspeed;

class WebshopappApiResourceOrdersCredit
{
    /**
     * @var WebshopappApiClient
     */
    private $client;

    public function __construct(WebshopappApiClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param int $orderId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create($orderId, $fields)
    {
        $fields = array('credit' => $fields);

        return $this->client->create('orders/' . $orderId . '/credit', $fields);
    }
}
