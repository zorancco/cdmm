<?php

use \zorancco\ApiClients\TrelloAPI\TrelloDataProcessor as TrelloData;

class TrelloDataProcessorTest extends PHPUnit_Framework_TestCase
{
    private $_SUT;

    public function setUp()
    {
        $this->_SUT = new TrelloData();
    }

    /**
     * Test Trello Data is filtered
     * @test
     */
    public function trelloDataIsFiltered()
    {
        //print_r( $this->trelloRawData() );
    }

    /**
     * Test valid credentials can pull the Trello data
     *
     */
    public function trelloRawData()
    {
        return json_decode( file_get_contents( 'response.json' ) );
    }

}
