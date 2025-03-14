<?php

namespace Lightspeed;

class WebshopappApiResourceFiltersValues
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
     * @param int $filterId
     * @param int $filterValueId
     * @param array $params
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function get($filterId, $filterValueId = null, $params = array())
    {
        if (!$filterValueId)
        {
            return $this->client->read('filters/' . $filterId . '/values', $params);
        }
        else
        {
            return $this->client->read('filters/' . $filterId . '/values/' . $filterValueId, $params);
        }
    }

    /**
     * @param int $filterId
     * @param array $params
     *
     * @return int
     * @throws WebshopappApiException
     */
    public function count($filterId, $params = array())
    {
        return $this->client->read('filters/' . $filterId . '/values/count', $params);
    }

    /**
     * @param int $filterId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function create($filterId, $fields)
    {
        $fields = array('filterValue' => $fields);

        return $this->client->create('filters/' . $filterId . '/values', $fields);
    }

    /**
     * @param int $filterId
     * @param int $filterValueId
     * @param array $fields
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function update($filterId, $filterValueId, $fields)
    {
        $fields = array('filterValue' => $fields);

        return $this->client->update('filters/' . $filterId . '/values/' . $filterValueId, $fields);
    }

    /**
     * @param int $filterId
     * @param int $filterValueId
     *
     * @return array
     * @throws WebshopappApiException
     */
    public function delete($filterId, $filterValueId)
    {
        return $this->client->delete('filters/' . $filterId . '/values/' . $filterValueId);
    }
}
