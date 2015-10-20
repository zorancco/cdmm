<?php

namespace zorancco\ApiClients\TrelloApi;

class Teams
{
    private $teams = [
        'Frontend' => '',
        'Backend' => '',
        'PlantandNPI' => '',
        'IARC' => '',
        'EOPS' => '',
        'CET'  => '',
        'OET'  => '',
        'Integration' => '',
        'Manhattan' => ''
    ];

    public function getTeams()
    {
        return $this->teams;
    }
}
