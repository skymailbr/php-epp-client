<?php

$this->addExtension('brorg', 'urn:ietf:params:xml:ns:brorg-1.0');

include_once(dirname(__FILE__) . '/eppData/brOrg.php');

include_once(dirname(__FILE__) . '/eppRequests/eppCheckBrOrgRequest.php');
include_once(dirname(__FILE__) . '/eppResponses/eppCheckBrOrgResponse.php');
$this->addCommandResponse('Metaregistrar\EPP\eppCheckBrOrgRequest', 'Metaregistrar\EPP\eppCheckBrOrgResponse');

include_once(dirname(__FILE__) . '/eppRequests/eppCreateBrOrgRequest.php');
include_once(dirname(__FILE__) . '/eppResponses/eppCreateBrOrgResponse.php');
$this->addCommandResponse('Metaregistrar\EPP\eppCreateBrOrgRequest', 'Metaregistrar\EPP\eppCreateBrOrgResponse');

include_once(dirname(__FILE__) . '/eppRequests/eppInfoBrOrgRequest.php');
include_once(dirname(__FILE__) . '/eppResponses/eppInfoBrOrgResponse.php');
$this->addCommandResponse('Metaregistrar\EPP\eppInfoBrOrgRequest', 'Metaregistrar\EPP\eppInfoBrOrgResponse');
