<?php

namespace Metaregistrar\EPP;
class eppCreateBrDomainRequest extends eppCheckDomainRequest
{
	protected $extesion = ''
/*
	<?xml version="1.0" encoding="UTF-8" standalone="no"?>
	<epp xmlns="urn:ietf:params:xml:ns:epp-1.0"
	     xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
	     xsi:schemaLocation="urn:ietf:params:xml:ns:epp-1.0
	     epp-1.0.xsd">
	  <command>
	    <check>
	      <domain:check
	       xmlns:domain="urn:ietf:params:xml:ns:domain-1.0"
	       xsi:schemaLocation="urn:ietf:params:xml:ns:domain-1.0
	       domain-1.0.xsd">
	        <domain:name>example.com.br</domain:name>
	        <domain:name>example.net.br</domain:name>
	        <domain:name>example.org.br</domain:name>
	      </domain:check>
	    </check>
	    <extension>
	      <brdomain:check
	       xmlns:brdomain="urn:ietf:params:xml:ns:brdomain-1.0"
	       xsi:schemaLocation="urn:ietf:params:xml:ns:brdomain-1.0
	       brdomain-1.0.xsd">
	       <brdomain:organization>
	         005.506.560/0001-36
	       </brdomain:organization>
	      </brdomain:check>
	    </extension>
	    <clTRID>ABC-12345</clTRID>
	  </command>
	</epp>

 */

    /**
     * @throws eppException
     */
    public function __construct($createinfo, $forcehostattr = false, $namespacesinroot = true, $usecdata = true)
    {
        parent::__construct($createinfo, $forcehostattr = false, $namespacesinroot = true, $usecdata = true);
    }

    /**
     * @param string $organization
     * @return void
     */
    public function check(string $organization) {
	    $extension = $this->getExtension();
	    $check = $this->createElement('brdomain:check');
	    $check->setAttribute('xmlns:brdomain','urn:ietf:params:xml:ns:brdomain-1.0');
	    $check->setAttribute('xsi:schemaLocation','urn:ietf:params:xml:ns:brdomain-1.0 brdomain-1.0.xsd');
	    $oganization = $this->createElement('brdomain:organization', $organization);
		$check->appendChild($organization);
	    $extension->appendChild($check);
		$this->addSessionId();
	}
}