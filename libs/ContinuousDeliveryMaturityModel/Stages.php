<?php

namespace zorancoo\ContinuousDeliveryMaturityModel;


class Stages
{
    private $stages = [
        "base",
        "beginner",
        "intermediate",
        "advanced",
        "expert"
    ];

    /**
     * @return array
     */
    public function __construct()
    {
        return $this->stages;
    }
}
