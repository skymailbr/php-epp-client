<?php

namespace Metaregistrar\EPP;
class eppCreateBrDomainRequest extends eppCreateDomainRequest
{
	/*
	<?xml version="1.0" encoding="UTF-8" standalone="no"?>
	<epp xmlns="urn:ietf:params:xml:ns:epp-1.0"
	     xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
	     xsi:schemaLocation="urn:ietf:params:xml:ns:epp-1.0
	     epp-1.0.xsd">
	  <command>
	    <create>
	      <domain:create
	       xmlns:domain="urn:ietf:params:xml:ns:domain-1.0"
	       xsi:schemaLocation="urn:ietf:params:xml:ns:domain-1.0
	       domain-1.0.xsd">
	        <domain:name>example.com.br</domain:name>
	        <domain:ns>
	          <domain:hostAttr>
	            <domain:hostName>ns1.example.com.br</domain:hostName>
	            <domain:hostAddr ip="v4">192.0.2.1</domain:hostAddr>
	          </domain:hostAttr>
	          <domain:hostAttr>
	            <domain:hostName>ns1.example.net.br</domain:hostName>
	          </domain:hostAttr>
	        </domain:ns>
	        <domain:contact type="admin">fan</domain:contact>
	        <domain:contact type="tech">fan</domain:contact>
	        <domain:contact type="billing">fan</domain:contact>
	        <domain:authInfo>
	          <domain:pw>2fooBAR</domain:pw>
	        </domain:authInfo>
	      </domain:create>
	    </create>
	    <extension>
	      <brdomain:create
	       xmlns:brdomain="urn:ietf:params:xml:ns:brdomain-1.0"
	       xsi:schemaLocation="urn:ietf:params:xml:ns:brdomain-1.0
	       brdomain-1.0.xsd">
	       <brdomain:organization>
	         005.506.560/0001-36
	       </brdomain:organization>
	       <brdomain:releaseProcessFlags flag1="1"/>
	       <brdomain:autoRenew active="0"/>
	      </brdomain:create>
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
    public function create(string $organization, bool $autoRenew = false) {
	    $this->addExtension('xmlns:brdomain', 'urn:ietf:params:xml:ns:brdomain-1.0');
	    $ext = $this->createElement('extension');
	    $organization = $this->createElement('brdomain:organization');
	    $create = $this->createElement('dnsbe:create');
	    $domain = $this->createElement('dnsbe:domain');
	    if(is_array($nsgroup)){
		    foreach ($nsgroup as $nsgroupname){
			    $domain->appendChild($this->createElement('dnsbe:nsgroup', $nsgroupname));
		    }
	    }
	    else {
		    $domain->appendChild($this->createElement('dnsbe:nsgroup', $nsgroup));
	    }
	    $create->appendChild($domain);
	    $dnsext->appendChild($create);
	    $ext->appendChild($dnsext);
	    $this->getCommand()->appendChild($ext);
	    $this->addSessionId();
    }
}