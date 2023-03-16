<?php

namespace Metaregistrar\EPP;
class eppCreateBrOrgRequest extends eppCreateContactRequest
{
    function __construct($createinfo, $namespacesinroot = true, $usecdata = true) {
        parent::__construct($createinfo, $namespacesinroot, $usecdata);
    }

    public function setOrganization(brORg $organization) {
        $extension = $this->getExtension();
        $create = $this->createElement('brorg:create');
        $create->setAttribute('xmlns:brorg','urn:ietf:params:xml:ns:brorg-1.0');

        $oganization = $this->createElement('brorg:organization', $organization->getOrganization());
        $create->appendChild($oganization);

        $contact = $this->createElement('brorg:contact', $organization->getContact());
        $contact->setAttribute('type', $organization->getContactType());
        $create->appendChild($contact);

        $responsible = $this->createElement('brorg:responsible', $organization->getResponsible());
        $create->appendChild($responsible);

        $extension->appendChild($create);
        $this->extension = $extension;
    }
}