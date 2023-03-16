<?php

namespace Metaregistrar\EPP;

use DOMException;

class eppInfoBrOrgRequest extends eppInfoContactRequest
{
/*
   C:<?xml version="1.0" encoding="UTF-8" standalone="no"?>
   C:<epp xmlns="urn:ietf:params:xml:ns:epp-1.0">
   C:  <command>
   C:    <check>
   C:      <contact:check
   C:       xmlns:contact="urn:ietf:params:xml:ns:contact-1.0">
   C:        <contact:id>e123456</contact:id>
   C:        <contact:id>e654321</contact:id>
   C:      </contact:check>
   C:    </check>
   C:    <extension>
   C:      <brorg:check
   C:       xmlns:brorg="urn:ietf:params:xml:ns:brorg-1.0">
   C:       <brorg:cd>
   C:         <brorg:id>e123456</brorg:id>
   C:         <brorg:organization>
   C:           043.828.151/0001-45
   C:         </brorg:organization>
   C:       </brorg:cd>
   C:       <brorg:cd>
   C:         <brorg:id>e654321</brorg:id>
   C:         <brorg:organization>
   C:           005.506.560/0001-36
   C:         </brorg:organization>
   C:       </brorg:cd>
   C:      </brorg:check>
   C:    </extension>
   C:    <clTRID>ABC-12345</clTRID>
   C:  </command>
   C:</epp>
 */

    function __construct($inforequest, $namespacesinroot = true, $usecdata = true) {
        parent::__construct($inforequest, $namespacesinroot, $usecdata);
    }

    /**
     * @throws DOMException
     */
    public function setOrganization(brOrg $brOrg) {
        $extension = $this->getExtension();
        $info = $this->createElement('brorg:info');
        $info->setAttribute('xmlns:brorg','urn:ietf:params:xml:ns:brorg-1.0');
        $oganization = $this->createElement('brorg:organization', $brOrg->getOrganization());
        $info->appendChild($oganization);
        $extension->appendChild($info);
        $this->extension = $extension;
    }
}
