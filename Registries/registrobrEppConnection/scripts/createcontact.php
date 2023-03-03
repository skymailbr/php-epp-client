<?php

use \Metaregistrar\EPP\registrobrEppConnection;
use \Metaregistrar\EPP\eppException;

require('../../../autoloader.php');

try {
    $conn = registrobrEppConnection::create('../registrobr.ini', true);
    if ($conn->login()) {
        $contact = new \Metaregistrar\EPP\eppContact();
        $postalInfo = new \Metaregistrar\EPP\eppContactPostalInfo();
        $postalInfo->setType('loc');
        $postalInfo->setName('Lucas Marin');
        $postalInfo->addStreet('Rua Guanabara');
        $postalInfo->addStreet('110');
        $postalInfo->addStreet('AP 11');
        $postalInfo->setCity('Sao Paulo');
        $postalInfo->setProvince('SP');
        $postalInfo->setZipcode('17900-000');
        $postalInfo->setCountrycode('BR');
        $contact->addPostalInfo($postalInfo);
        $contact->setVoice('55.11972064945');
        $contact->setEmail('lucasmarin@gmail.com');
        $conn->request(new \Metaregistrar\EPP\eppCreateContactRequest($contact));
    }
} catch (eppException $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
    echo $e->getLastCommand();
    echo "\n\n";
}
