<?php

$this->addExtension('brorg', 'urn:ietf:params:xml:ns:brorg-1.0');

include_once(dirname(__FILE__) . '/eppData/brOrg.php');

include_once(dirname(__FILE__) . '/eppRequests/eppCheckBrOrgRequest.php');
include_once(dirname(__FILE__) . '/eppResponses/eppCheckBrOrgResponse.php');
$this->addCommandResponse('Metaregistrar\EPP\eppCheckBrOrgRequest', 'Metaregistrar\EPP\eppCheckBrOrgResponse');
