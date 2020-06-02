<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: Max Schumann
 * Email: mschumann@moreweb.info
 * Date: 28.05.20
 * Time: 14:38
 */

namespace Dant89\IXAPIClient\Extension;

use Dant89\IXAPIClient\AbstractHttpClient;
use Dant89\IXAPIClient\Response;

class PriceClient extends AbstractHttpClient
{
    const URL = '/extension/v1-decix-pricing-v1/quote';

    public function getPrice(array $filter): Response
    {
        return $this->get(self::URL, $filter);
    }
}
