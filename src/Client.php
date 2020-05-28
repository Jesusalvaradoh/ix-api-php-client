<?php

namespace Dant89\IXAPIClient;

use Dant89\IXAPIClient\Auth\AuthClient;
use Dant89\IXAPIClient\Connections\ConnectionsClient;
use Dant89\IXAPIClient\Contacts\ContactsClient;
use Dant89\IXAPIClient\Customers\CustomersClient;
use Dant89\IXAPIClient\Demarcs\DemarcsClient;
use Dant89\IXAPIClient\Devices\DevicesClient;
use Dant89\IXAPIClient\Extension\PriceClient;
use Dant89\IXAPIClient\Facilities\FacilitiesClient;
use Dant89\IXAPIClient\Ips\IpsClient;
use Dant89\IXAPIClient\Macs\MacsClient;
use Dant89\IXAPIClient\NetworkFeatures\NetworkFeaturesClient;
use Dant89\IXAPIClient\NetworkFeatureConfigs\NetworkFeatureConfigsClient;
use Dant89\IXAPIClient\NetworkServices\NetworkServicesClient;
use Dant89\IXAPIClient\NetworkServiceConfigs\NetworkServiceConfigsClient;
use Dant89\IXAPIClient\Pops\PopsClient;
use Dant89\IXAPIClient\Products\ProductsClient;

/**
 * Class Client
 * @package Dant89\IXAPIClient
 */
class Client
{
    /**
     * @var string
     */
    const API_VERSION = 'v1';

    /**
     * @var string
     */
    private $baseUrl;

    /**
     * @var string|null
     */
    private $bearerToken;

    /**
     * @var \Symfony\Contracts\HttpClient\HttpClientInterface
     */
    private $httpClient;

    /**
     * Client constructor.
     * @param string $exchangeUrl
     * @param \Symfony\Contracts\HttpClient\HttpClientInterface|null $httpClient
     */
    public function __construct(string $exchangeUrl, \Symfony\Contracts\HttpClient\HttpClientInterface $httpClient = null)
    {
        $this->baseUrl = $exchangeUrl;
        $this->httpClient = $httpClient;
    }

    /**
     * @return string
     */
    public function getApiVersion(): string
    {
        return self::API_VERSION;
    }

    /**
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * @return null|string
     */
    public function getBearerToken(): ?string
    {
        return $this->bearerToken;
    }

    /**
     * @param string $bearerToken
     * @return Client
     */
    public function setBearerToken(string $bearerToken): Client
    {
        $this->bearerToken = $bearerToken;
        return $this;
    }

    /**
     * @param string $name
     * @return AuthClient|ConnectionsClient|ContactsClient|CustomersClient|DemarcsClient|DevicesClient|FacilitiesClient|IpsClient|MacsClient|NetworkFeaturesClient|NetworkFeatureConfigsClient|NetworkServicesClient|NetworkServiceConfigsClient|PopsClient|ProductsClient|PriceClient
     */
    public function getHttpClient(string $name): AbstractHttpClient
    {
        switch ($name) {
            case 'auth':
                $client = new AuthClient($this, $this->httpClient);
                break;

            case 'connections':
                $client = new ConnectionsClient($this, $this->httpClient);
                break;

            case 'contacts':
                $client = new ContactsClient($this, $this->httpClient);
                break;

            case 'customers':
                $client = new CustomersClient($this, $this->httpClient);
                break;

            case 'demarcs':
                $client = new DemarcsClient($this, $this->httpClient);
                break;

            case 'devices':
                $client = new DevicesClient($this, $this->httpClient);
                break;

            case 'facilities':
                $client = new FacilitiesClient($this, $this->httpClient);
                break;

            case 'ips':
                $client = new IpsClient($this, $this->httpClient);
                break;

            case 'macs':
                $client = new MacsClient($this, $this->httpClient);
                break;

            case 'network-features':
                $client = new NetworkFeaturesClient($this, $this->httpClient);
                break;

            case 'network-feature-configs':
                $client = new NetworkFeatureConfigsClient($this, $this->httpClient);
                break;

            case 'network-services':
                $client = new NetworkServicesClient($this, $this->httpClient);
                break;

            case 'network-service-configs':
                $client = new NetworkServiceConfigsClient($this, $this->httpClient);
                break;

            case 'pops':
                $client = new PopsClient($this, $this->httpClient);
                break;

            case 'products':
                $client = new ProductsClient($this, $this->httpClient);
                break;

            case 'extension/price':
                $client = new PriceClient($this, $this->httpClient);
                break;
            default:
                throw new \InvalidArgumentException(sprintf('Undefined api instance called: "%s"', $name));
        }

        return $client;
    }
}
