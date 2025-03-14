<?php

namespace Lightspeed;

class WebshopappApiResourceWebhooks
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
        $fields = array('webhook' => $fields);

        return $this->client->create('webhooks', $fields);
    }

    /**
     * @param int $webhookId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get($webhookId = null, $params = array())
    {
        if (!$webhookId)
        {
            return $this->client->read('webhooks', $params);
        }
        else
        {
            return $this->client->read('webhooks/' . $webhookId, $params);
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
        return $this->client->read('webhooks/count', $params);
    }

    /**
     * @param int $webhookId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update($webhookId, $fields)
    {
        $fields = array('webhook' => $fields);

        return $this->client->update('webhooks/' . $webhookId, $fields);
    }

    /**
     * @param int $webhookId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete($webhookId)
    {
        return $this->client->delete('webhooks/' . $webhookId);
    }
}
