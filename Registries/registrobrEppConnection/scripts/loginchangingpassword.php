<?php

use \Metaregistrar\EPP\registrobrEppConnection;
use \Metaregistrar\EPP\eppException;

require('../../../autoloader.php');

try {
    die("Are you sure? If yes... Please remove this line(" . __LINE__ . ") and after change the value on this file with password on ../registrobr.ini file" . PHP_EOL);
    $conn = registrobrEppConnection::create('../registrobr.ini', true);
    $conn->setNewPassword('abcd=1234');
    $conn->login();
} catch (eppException $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
    echo $e->getLastCommand();
    echo "\n\n";
}
