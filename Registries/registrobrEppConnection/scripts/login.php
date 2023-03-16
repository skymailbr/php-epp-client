<?php

use \Metaregistrar\EPP\registrobrEppConnection;
use \Metaregistrar\EPP\eppException;

require('../../../autoloader.php');

try {
    $conn = registrobrEppConnection::create('../registrobr.ini', true);
    $conn->login();
} catch (eppException $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
    echo $e->getLastCommand();
    echo "\n\n";
}
