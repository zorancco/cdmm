<?php

namespace zorancoo\ExternalAPIs;

//use zorancoo\ExternalAPIs\trelloAPI\Validation as Validation;

class trelloAPI

{
    private $data = array();
    private $errors;
    private $externalApi;
    private $apiUrlTemplate = 'https://api.trello.com/1/boards/';

    public function __construct( $externalApi, $errors )
    {
        $this->externalApi = $externalApi;
        $this->errors = $errors;
    }
    /**
     * Share a photobook widget via email. Triggered through AJAX.
     * @see ap_social_share.js
     */

    public function processAPI( $post )
    {

    }

   private function getApiUrl( $boardId )
    {
        return   $this->apiUrlTemplate . $boardId . '/checklists/?key=b450fa0aae7ff518ab65d67a94164781&token=49b72281294286abaf5f8bba0ac3c7942cd3c60e8a4f0fb1b74ed32d00596450&fields=all&actions=all&action_fields=all&actions_limit=1000&cards=all&card_fields=all&card_attachments=true&labels=all&lists=all&list_fields=all&members=all&member_fields=all&checklists=all&checklist_fields=all&organization=false';
    }

    private function processResponse( $response )
    {
        // check if we have a response from the server
        if ($response && strtolower($response) !== 'ok') {
            $this->data = $this->errors->errorConnectionServerFeedback();
        }

        $this->data['status'] = 'success';
    }
}
