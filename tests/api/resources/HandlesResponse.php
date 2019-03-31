<?php

namespace Tests\Api\Resources;

/**
 * Trait HandlesResponse
 *
 * @package Tests\Api\Resources
 */
trait HandlesResponse
{
    /**
     * Parse the API response from an API call into json decoded
     *
     * @return mixed
     */
    protected function getApiResponse()
    {
        return json_decode($this->tester->grabResponse(), true);
    }
}