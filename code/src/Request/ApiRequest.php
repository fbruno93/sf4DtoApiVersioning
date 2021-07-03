<?php

namespace App\Request;

use App\Exception\ApiRequestException;
use Symfony\Component\HttpFoundation\Request;

abstract class ApiRequest
{
    public const API_V2 = "v2";
    public const API_V3 = "v3";

    private const API_VERSION_AVAILABLE = [
        self::API_V2,
        self::API_V3
    ];

    private string $apiVersion;

    public function __construct(Request $request)
    {
        $this->apiVersion = $request->attributes->get('apiVersion');

        if (!in_array($this->apiVersion, self::API_VERSION_AVAILABLE)) {
            throw new ApiRequestException("Not supported $this->apiVersion. Only support " . implode(", ", self::API_VERSION_AVAILABLE));
        }
    }

    public function isApiV2(): bool
    {
        return $this->apiVersion == self::API_V2;
    }

    public function getApiVersion()
    {
        return "api_$this->apiVersion";
    }
}
