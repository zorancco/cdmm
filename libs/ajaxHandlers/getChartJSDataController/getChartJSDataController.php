<?php
namespace zorancco\Ajax\Controller;

use zorancco\ApiClients\TrelloApi as TrelloApi;
use \zorancco\ContinuousDeliveryMaturityModel;
//\Teams as Teams;

class getChartJSDataController implements \zorancco\Ajax\Controller
{
    public function execute( $post )
    {
        $teams = new TrelloApi\Teams();
        $allTeams = $teams->getTeams();
        foreach ( $allTeams as $teamName => $boardId )
        {
            $processedData[$boardId] = [ "teamName" => $teamName ];
            //$trelloApiClient = new TrelloApi();

            $model = new ContinuousDeliveryMaturityModel();
            $rawData = json_decode( file_get_contents(ROOT . 'libs/TrelloAPI/responses/' . $teamName . '.json') );//$trelloApiClient->getBoardData( $boardId );
            $model->processRawData($rawData);
            $processedData[$boardId]["teamData"] = $model->getPercentagesForEachCategory();
        }
        return $processedData;//$processedData;//$trelloApiClient->getBoardData( $boardId );
    }
}
