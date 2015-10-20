<?php

namespace zorancoo\ContinuousDeliveryMaturityModel;


class Category
{
    private $category;

    private $stage;

    private $data;

    /**
     * @return array
     */
    public function __construct( $category, $stageIndex, $data )
    {

        $this->category = $category;
        $this->setStage($stageIndex);
        $this->data = $data;
    }

    private function setStage( $stageIndex )
    {
        $stages = new Stages();

        if ( !isset ($stages[$stageIndex]) ) {
            throw new Exception('Undefined Stage.');
        }

        $this->stage = $stages[$stageIndex];
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }


    /**
     * This is represented as a Trello Card
     *
     * @param $index
     */
    public function getStage()
    {
        $this->stage;
    }
}
