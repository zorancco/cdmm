<?php

namespace zorancco\ApiClients\TrelloApi;

class Teams
{
    private $teams = [
        'Frontend' => '#FRONTEND-KEY#',
        'Backend' => '#BACKEND-KEY#',
        'PlantandNPI' => '#PLANT-KEY#',
        'IARC' => '#IARC-KEY#',
        'EOPS' => '#EOPS-KEY#',
        'CET'  => '#CET-KEY#',
        'OET'  => '#OET-KEY#',
        'Integration' => '#INTEGRATION-KEY#',
        'Manhattan' => '#MANHATTAN-KEY#'
    ];

    public function getTeams()
    {
        return $this->teams;
    }
}
