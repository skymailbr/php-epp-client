<?php

use \Metaregistrar\EPP\registrobrEppConnection;
use \Metaregistrar\EPP\eppException;

require('../../../autoloader.php');

try {
    $conn = registrobrEppConnection::create('../registrobr.ini', true);
    if ($conn->login()) {
        $contactHandle = new \Metaregistrar\EPP\eppContactHandle('LUMAR3');
        $conn->request(new \Metaregistrar\EPP\eppInfoContactRequest($contactHandle));
    }
} catch (eppException $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
    echo $e->getLastCommand();
    echo "\n\n";
}
