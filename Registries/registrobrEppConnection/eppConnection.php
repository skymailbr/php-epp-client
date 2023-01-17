<?php

namespace Metaregistrar\EPP;

class registrobrEppConnection extends eppConnection {

    function __construct($logging = false, $settingsFile = null) {
        parent::__construct($logging, $settingsFile);
        parent::enableDnssec();
        parent::useExtension('registrobr-1.0');
    }

    public function addCommandResponse($command, $response) {
        parent::addCommandResponse($command, $response);
    }

}
