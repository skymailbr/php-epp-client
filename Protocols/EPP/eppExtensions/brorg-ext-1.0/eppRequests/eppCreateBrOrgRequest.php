<?php

namespace Metaregistrar\EPP;
class eppCreateBrOrgRequest extends eppContact
{

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
    public function create(string $organization) {
        
    }
}