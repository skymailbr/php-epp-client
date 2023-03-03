<?php
namespace Metaregistrar\EPP;

class eppCheckBrOrgResponse extends eppCheckContactResponse {
    function __construct() {
        parent::__construct();
    }

    /**
     * Retrieve an array of domain names associated with this contact
     * @return BrOrg|null
     */
    public function getBrOrg() {
        $xpath = $this->xPath();
        $result = $xpath->query('/epp:epp/epp:response/epp:extension/brorg:chkData/brorg:ticketInfo:*');
        if ($result->length > 0) {
            $brOrg = new brOrg();
            return $brOrg;
        }

        return null;
    }
}
