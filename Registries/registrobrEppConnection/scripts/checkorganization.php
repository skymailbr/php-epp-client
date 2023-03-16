<?php

use \Metaregistrar\EPP\registrobrEppConnection;
use \Metaregistrar\EPP\eppException;

require('../../../autoloader.php');

try {
    $conn = registrobrEppConnection::create('../registrobr.ini', true);
    if ($conn->login()) {
        $contactHandle = new \Metaregistrar\EPP\eppContactHandle(1);
        $request = new \Metaregistrar\EPP\eppCheckBrOrgRequest($contactHandle);
        $brOrg = new \Metaregistrar\EPP\brOrg();
        $brOrg->setOrganization('17.644.286/0001-40');
        $request->setOrganization($brOrg);
        $conn->request($request);
    }
} catch (eppException $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
    echo $e->getLastCommand();
    echo "\n\n";
}
