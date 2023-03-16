<?php

use \Metaregistrar\EPP\registrobrEppConnection;
use \Metaregistrar\EPP\eppException;

require('../../../autoloader.php');

try {
    $conn = registrobrEppConnection::create('../registrobr.ini', true);
    if ($conn->login()) {
        $contact = new \Metaregistrar\EPP\eppContactHandle('LUMAR3');
        $postalInfo = new \Metaregistrar\EPP\eppContactPostalInfo();
        $postalInfo->setType('loc');
        $postalInfo->addStreet('Rua Guanabara2');
        $postalInfo->addStreet('111');
        $postalInfo->addStreet('Ap 12');
        $updateInfo = new \Metaregistrar\EPP\eppContact($postalInfo, 'lucasmarin2@gmail.com', '55.11972064946');
        $updateRequest = new \Metaregistrar\EPP\eppUpdateContactRequest($contact, null, null, $updateInfo);
        $contact = $conn->request($updateRequest);
    }
} catch (eppException $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
    echo $e->getLastCommand();
    echo "\n\n";
}
