<?php

namespace Exs\CamTrackingBundle\Service;

use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Response;

class PersistenceService {

    protected $tracking = null;

    public function persistTrackingInfo(Response $response)
    {
        $trackingCookie = new Cookie('afno', $this->getCamTrackingInfo());
        return $response->headers->setCookie($trackingCookie);
    }

    public function setCamTrackingInfo($tracking)
    {
        $this->tracking = $tracking;
    }

    public function getCamTrackingInfo()
    {
        return $this->tracking;
    }
}
