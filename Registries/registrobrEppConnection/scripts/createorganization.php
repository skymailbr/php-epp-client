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
        $request = new \Metaregistrar\EPP\eppCreateBrOrgRequest($contact);
        $organization = new \Metaregistrar\EPP\brOrg();
        $organization->setOrganization('82.407.396/0001-50');
        $organization->setContactType('admin');
        $organization->setContact('LUMAR3');
        $organization->setResponsible('Lucas Marin');
        $request->setOrganization($organization);
        $conn->request($request);
    }
} catch (eppException $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
    echo $e->getLastCommand();
    echo "\n\n";
}
