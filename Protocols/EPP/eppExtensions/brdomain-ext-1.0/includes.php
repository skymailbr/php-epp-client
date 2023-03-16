<?php

$this->addExtension('brdomain', 'urn:ietf:params:xml:ns:brdomain-1.0');

include_once(dirname(__FILE__) . '/eppData/brDomain.php');

include_once(dirname(__FILE__) . '/eppRequests/eppCheckBrDomainRequest.php');
include_once(dirname(__FILE__) . '/eppResponses/eppCheckBrDomainResponse.php');
$this->addCommandResponse('Metaregistrar\EPP\eppCheckBrDomainRequest', 'Metaregistrar\EPP\eppCheckBrDomainResponse');

#include_once(dirname(__FILE__) . '/eppRequests/eppCreateBrDomainRequest.php');
#include_once(dirname(__FILE__) . '/eppRequests/eppCreateBrDomainResponse.php');
#$this->addCommandResponse('Metaregistrar\EPP\eppCreateBrDomainRequest', 'Metaregistrar\EPP\eppCreateBrDomainRequest');

