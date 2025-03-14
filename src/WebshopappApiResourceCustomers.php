<?php

namespace Lightspeed;

class WebshopappApiResourceCustomers
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
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create($fields)
    {
        $fields = array('customer' => $fields);

        return $this->client->create('customers', $fields);
    }

    /**
     * @param int $customerId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get($customerId = null, $params = array())
    {
        if (!$customerId)
        {
            return $this->client->read('customers', $params);
        }
        else
        {
            return $this->client->read('customers/' . $customerId, $params);
        }
    }

    /**
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count($params = array())
    {
        return $this->client->read('customers/count', $params);
    }

    /**
     * @param int $customerId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update($customerId, $fields)
    {
        $fields = array('customer' => $fields);

        return $this->client->update('customers/' . $customerId, $fields);
    }

    /**
     * @param int $customerId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete($customerId)
    {
        return $this->client->delete('customers/' . $customerId);
    }
}
