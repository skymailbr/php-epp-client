<?php

namespace Metaregistrar\EPP;
class eppInfoBrDomainRequest extends eppInfoDomainRequest
{
	protected $extesion = '';
/*
   S:<?xml version="1.0" encoding="UTF-8" standalone="no"?>
   S:<epp xmlns="urn:ietf:params:xml:ns:epp-1.0"
   S:     xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
   S:     xsi:schemaLocation="urn:ietf:params:xml:ns:epp-1.0
   S:     epp-1.0.xsd">
   S:  <response>
   S:    <result code="1000">
   S:      <msg>Command completed successfully</msg>
   S:    </result>
   S:    <resData>
   S:      <domain:infData
   S:       xmlns:domain="urn:ietf:params:xml:ns:domain-1.0"
   S:       xsi:schemaLocation="urn:ietf:params:xml:ns:domain-1.0
   S:       domain-1.0.xsd">
   S:        <domain:name>example.com.br</domain:name>
   S:        <domain:roid>EXAMPLE1-REP</domain:roid>
   S:        <domain:status s="pendingCreate"/>
   S:        <domain:contact type="admin">fan</domain:contact>
   S:        <domain:contact type="tech">fan</domain:contact>
   S:        <domain:contact type="billing">fan</domain:contact>
   S:        <domain:ns>
   S:          <domain:hostAttr>
   S:            <domain:hostName>ns1.example.com.br</domain:hostName>
   S:            <domain:hostAddr ip="v4">192.0.2.1</domain:hostAddr>
   S:          </domain:hostAttr>
   S:          <domain:hostAttr>
   S:            <domain:hostName>ns1.example.net.br</domain:hostName>
   S:          </domain:hostAttr>
   S:        </domain:ns>
   S:        <domain:clID>ClientX</domain:clID>
   S:        <domain:crID>ClientX</domain:crID>
   S:        <domain:crDate>2006-01-30T22:00:00.0Z</domain:crDate>
   S:        <domain:upID>ClientX</domain:upID>
   S:        <domain:upDate>2006-01-31T09:00:00.0Z</domain:upDate>
   S:      </domain:infData>
   S:    </resData>
   S:    <extension>
   S:      <brdomain:infData
   S:       xmlns:brdomain="urn:ietf:params:xml:ns:brdomain-1.0"
   S:       xsi:schemaLocation="urn:ietf:params:xml:ns:brdomain-1.0
   S:       brdomain-1.0.xsd">
   S:       <brdomain:ticketNumber>123456</brdomain:ticketNumber>
   S:       <brdomain:organization>
   S:         005.506.560/0001-36
   S:       </brdomain:organization>
   S:       <brdomain:releaseProcessFlags flag1="1"/>
   S:       <brdomain:pending>
   S:         <brdomain:dns status="queryTimeOut">
   S:           <brdomain:hostName>
   S:             ns1.example.com.br
   S:           </brdomain:hostName>
   S:           <brdomain:limit>2006-02-13T22:00:00.0Z</brdomain:limit>
   S:         </brdomain:dns>
   S:         <brdomain:doc status="notReceived">
   S:           <brdomain:docType>CNPJ</brdomain:docType>
   S:           <brdomain:limit>2006-03-01T22:00:00.0Z</brdomain:limit>
   S:           <brdomain:description lang="pt">
   S:             Cadastro Nacional da Pessoa Juridica
   S:           </brdomain:description>
   S:         </brdomain:doc>
   S:         <brdomain:releaseProc status="waiting">
   S:           <brdomain:limit>2006-02-01T22:00:00.0Z</brdomain:limit>
   S:         </brdomain:releaseProc>
   S:       </brdomain:pending>
   S:       <brdomain:ticketNumberConc>
   S:         123451
   S:       </brdomain:ticketNumberConc>
   S:       <brdomain:ticketNumberConc>
   S:         123455
   S:       </brdomain:ticketNumberConc>
   S:      </brdomain:infData>
   S:    </extension>
   S:    <trID>
   S:      <clTRID>ABC-12345</clTRID>
   S:      <svTRID>54322-XYZ</svTRID>
   S:    </trID>
   S:  </response>
   S:</epp>

 */

    /**
     * @throws eppException
     */
    public function __construct($infodomain, $hosts = null, $namespacesinroot = true, $usecdata = true) {
        parent::__construct($infodomain, $hosts, $namespacesinroot, $usecdata);
    }

    public function setBrDomain(brDomain $brDomain) {
        $extension = $this->getExtension();
        $infData = $this->createElement('brdomain:infData');
        $infData->setAttribute('xmlns:brdomain','urn:ietf:params:xml:ns:brdomain-1.0');
        $infData->setAttribute('xsi:schemaLocation','urn:ietf:params:xml:ns:brdomain-1.0 brdomain-1.0.xsd');
        $ticketNumber = $this->createElement('brdomain:ticketNumber', $brDomain->getTicketNumber());
        $infData->appendChild($ticketNumber);
        $organization = $this->createElement('brdomain:organization', $brDomain->getOrganization());
        $infData->appendChild($organization);
        $releaseProcessFlags = $this->createElement('brdomain:releaseProcessFlags');
        if (isset($brDomain->getReleaseProcessFlags()['flag1'])) {
            $releaseProcessFlags->setAttribute('flag1', $brDomain->getReleaseProcessFlags()['flag1']);
        }
        $extension->appendChild($infData);
        $this->extension = $extension;
    }
}
