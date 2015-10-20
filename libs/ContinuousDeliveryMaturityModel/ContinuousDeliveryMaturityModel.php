<?php

namespace zorancco;

class ContinuousDeliveryMaturityModel
{

    private $data = [
        "culture" => [
            0 => [
                "Prioritized Backlog"                       => false,
                "Defined and documented process"            => false,
                "Frequent commits"                          => false
            ],
            1 => [
                "One backlog per team"                      => false,
                "Share the pain"                            => false,
                "Stable teams"                              => false,
                "Adopt basic Agile methods"                 => false,
                "Remove boundary dev and test"              => false
            ],
            2 => [
                "Extended team collaboration"               => false,
                "Component ownership"                       => false,
                "Act on metrics"                            => false,
                "Remove boundary dev & ops"                 => false,
                "Common process for all changes"            => false,
                "Decentralize decissions"                   => false
            ],
            3 => [
                "Team responsible all the way to prod"      => false,
                "Deploy disconnected from Release"          => false,
                "Continuous Improvement (Kaizen)"           => false
            ],
            4 => [
                "Cross functional teams"                    => false,
                "No rollbacks (always forward)"             => false,
            ]
        ],
        "architecture" => [
            0 => [
                "Consolidated platform and technology"      => false
            ],
            1 => [
                "Organize system into modules"              => false,
                "API Managment"                             => false,
                "Library Managment"                         => false,
                "Version Control DB changes"                => false
            ],
            2 => [
                "No (or minimal) branching"                 => false,
                "Branch by abstraction"                     => false,
                "Configuration in code"                     => false,
                "Feature hiding"                            => false,
                "Making components out of modules"          => false
            ],
            3 => [
                "Full component based architecture"         => false,
                "Push based metrics"                        => false
            ],
            4 => [
                "Infrastructure as code"                    => false
            ]
        ],
        "pipeline" => [
            0 => [
                "Versioned Code Base"                       => false,
                "Scripted Builds"                           => false,
                "Basic Scheduled Builds (CI)"               => false,
                "Dedicated Build Server"                    => false,
                "Documented Manual Deploy"                  => false,
                "Some deployment script exist"              => false
            ],
            1 => [
                "Polling builds"                            => false,
                "builds are stored"                         => false,
                "Manual tag and versioning"                 => false,
                "First step towards standardized deploys"   => false
            ],
            2 => [
                "Auto triggered build (commit hooks)"       => false,
                "Automated tag and versioning"              => false,
                "Build once deploy anytime"                 => false,
                "Automated bulk of DB changes"              => false,
                "Basic pipeline with deploy to production"  => false,
                "Scripted config changes (eg app server)"   => false,
                "Standard process for all environments"     => false
            ],
            3 => [
                "Zero downtime deployments"                 => false,
                "Multiple build machines"                   => false,
                "Full automatic DB deploys"                 => false
            ],
            4 => [
                "Build bakery"                              => false,
                "Zero touch continuous deployment"          => false
            ]
        ],
        "quality" => [
            0 => [
                "Automatic unit tests"                      => false,
                "Separate test environment"                 => false
            ],
            1 => [
                "Automatic integration tests"               => false
            ],
            2 => [
                "Automatic component tests (isolated)"      => false,
                "Automatic acceptance tests"
            ],
            3 => [
                "Full automatic acceptance tests"           => false,
                "Automatic security tests"                  => false,
                "Risk based manual testing"                 => false
            ],
            4 => [
                "Very expected business value"              => false
            ]
        ],
        "reporting" => [
            0 => [
                "Baseline process metrics"                  => false,
                "Manual reporting"                          => false
            ],
            1 => [
                "Measure the process"                       => false,
                "Static code analysis"                      => false,
                "Scheduled quality reports"                 => false
            ],
            2 => [
                "Common information model"                  => false,
                "Traceability built into pipeline"          => false,
                "Report history is available"               => false
            ],
            3 => [
                "Graphing as a service"                     => false,
                "Dynamic test coverage analysis"            => false,
                "Report trend analysis"                     => false
            ],
            4 => [
                "Dynamic graphing and dashboards"           => false,
                "Cross silo analysis"                       => false
            ]
        ],
    ];

    public function processRawData( $rawData )
    {
        foreach ( $rawData as $category )
        {
            foreach( $category->checkItems as $checkItem )
            {
                if ( 'complete' === $checkItem->state )
                {
                    $this->setChecklistItem( $checkItem->name, true );
                }
            }
        }
    }
    public function getPercentagesForEachCategory()
    {
        $crunchedData = [];
        foreach( $this->data as $category => $stages )
        {
            $crunchedData[$category]['totalCategoryPercentage'] = 0;
            $totalStagesCount = count($stages);

            foreach( $stages as $stage => $checklistItems )
            {
                $checkedItemsCount = 0;
                $totalChecklistItemsCount = count($checklistItems);

                foreach( $checklistItems as $checkListItem => $state )
                {
                    if ($state)
                    {
                        $checkedItemsCount++;
                    }
                }

                $crunchedData[$category][$stage] = ( $checkedItemsCount / $totalChecklistItemsCount ) * 100;
                $crunchedData[$category]['totalCategoryPercentage'] += $crunchedData[$category][$stage];
            }
            $crunchedData[$category]['totalCategoryPercentage'] = $crunchedData[$category]['totalCategoryPercentage'] / $totalStagesCount;
        }
        return $crunchedData;
    }
    private function setChecklistItem( $name, $value )
    {
        foreach( $this->data as $category => $stages )
        {
            foreach( $stages as $stage => $checklistItems )
            {
                if ( isset($checklistItems[$name] ) )
                {
                    $this->data[$category][$stage][$name] = $value;
                    return true;
                }
            }
        }
        return false;
    }

    public function getData()
    {
        return $this->data;
    }
}
