<?php

namespace Lightspeed;

class WebshopappApiResourceProductsAttributes
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
     * @param int $productId
     * @param int $attributeId Set to null for bulk update.
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update($productId, $attributeId, $fields)
    {
        if (!$attributeId)
        {
            $fields = array('productAttributes' => $fields);

            return $this->client->update('products/' . $productId . '/attributes', $fields);
        }
        else
        {
            $fields = array('productAttribute' => $fields);

            return $this->client->update('products/' . $productId . '/attributes/' . $attributeId, $fields);
        }
    }

    /**
     * @param int $productId
     * @param int $attributeId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get($productId, $attributeId = null, $params = array())
    {
        if (!$attributeId)
        {
            return $this->client->read('products/' . $productId . '/attributes', $params);
        }
        else
        {
            return $this->client->read('products/' . $productId . '/attributes/' . $attributeId, $params);
        }
    }

    /**
     * @param int $productId
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count($productId, $params = array())
    {
        return $this->client->read('products/' . $productId . '/attributes/count', $params);
    }

    /**
     * @param int $productId
     * @param int $attributeId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete($productId, $attributeId)
    {
        return $this->client->delete('products/' . $productId . '/attributes/' . $attributeId);
    }
}
