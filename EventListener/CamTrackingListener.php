<?php

namespace Exs\CamTrackingBundle\EventListener;

use Exs\CamTrackingBundle\Service\PersistenceService;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class CamTrackingListener
{
    protected $tracker;

    protected $persistenceService;

    public function __construct(PersistenceService $persistenceService, $tracker)
    {
        $this->persistenceService = $persistenceService;
        // retrieve tracker name (ie: AFNO)
        $this->tracker = $tracker;
    }

    // read and store in cookies
    public function onKernelRequest(RequestEvent $event)
    {
        if (!$event->isMasterRequest()) {
            return;
        }

        $request = $event->getRequest();

        // gets afno cookie otherwise, null - step #1
        $trackingCookie = $request->cookies->get(strtolower($this->tracker));

        if ($trackingCookie === null) {
            $trackingCookie = $request->query->get(strtoupper($this->tracker));
        }

        $this->persistenceService->setCamTrackingInfo($trackingCookie);
        var_dump($this->tracker); die;
    }

}