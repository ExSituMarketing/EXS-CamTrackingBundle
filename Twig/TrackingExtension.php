<?php

namespace App\Twig;

use App\Service\PersistenceService;
use Twig\Extension\AbstractExtension;

class CamTrackingExtension extends AbstractExtension
{

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('appendTracking', array($this, 'appendCamTrackingParam'))
        );
    }

    public function appendCamTrackingParam(PersistenceService $persistenceService)
    {
        return $persistenceService->getCamTrackingInfo();
    }
}
