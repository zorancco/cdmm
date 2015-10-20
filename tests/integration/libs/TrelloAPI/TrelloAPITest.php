<?php

use zorancco\ApiClients\TrelloApi as TrelloApi;
use zorancco\ApiClients\TrelloApi\Teams as Teams;
class TrelloApiTest extends PHPUnit_Framework_TestCase
{
    private $_SUT;

    public function setUp()
    {
        $this->_SUT = new TrelloApi();
    }

    /**
     * Test valid credentials can pull the Trello data
     * @test
     */
    public function validCredentialsCanPullTrelloData()
    {
        $teams = new Teams();
        foreach ($teams->getTeams() as $team => $boardId) {

            $boardData = $this->_SUT->getBoardData( $boardId );
            $this->_SUT->saveData(ROOT . 'libs/TrelloAPI/responses/' . $team . '.json');
            $this->assertEquals( $boardId, $boardData[0]->idBoard );
        }
    }
}
