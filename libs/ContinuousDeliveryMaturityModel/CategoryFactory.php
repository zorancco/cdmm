<?php

namespace zorancoo\ContinuousDeliveryMaturityModel;


class CategoryFactory
{
    private $categories = [
        "culture"       => [
            "name" => "Culture and Organization",
        ],
        "architecture"  => [
            "name" => "Design and Architecture"
        ],
        "pipeline"      => [
            "name" => "Build and Deploy"
        ],
        "quality"       => [
            "name" => "Test and Verification"
        ],
        "reporting"     => [
            "name" => "Information and Reporting"
        ]
    ];

    private function setupCategories()
    {
        foreach ( $this->categories as $category => $categoryData )
        {
            $this->setUpStages( $category );
        }
    }

    private function setUpStages( $category, $data )
    {
        $this->categories["data"] = new Category($category, $level, $data );
    }
}
