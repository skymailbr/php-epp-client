<?php

use \Metaregistrar\EPP\registrobrEppConnection;
use \Metaregistrar\EPP\eppException;

require('../../../autoloader.php');

try {
    if ($conn = registrobrEppConnection::create('../registrobr.ini', true)) {
        if ($conn->login()) {
            $domains = [
                new \Metaregistrar\EPP\brDomain('skymail.com.br'),
                new \Metaregistrar\EPP\brDomain('skymail.net.br'),
                new \Metaregistrar\EPP\brDomain('skymail.gov.br'),
                new \Metaregistrar\EPP\brDomain('skymail.org.br'),
            ];
            $infoDomainRequest = new \Metaregistrar\EPP\eppCheckBrDomainRequest($domains);
            $conn->request($infoDomainRequest);
        }
    }
} catch (eppException $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
    echo $e->getLastCommand();
    echo "\n\n";
}
