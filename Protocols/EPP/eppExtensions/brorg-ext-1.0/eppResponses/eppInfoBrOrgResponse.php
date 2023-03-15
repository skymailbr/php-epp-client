<?php
namespace Metaregistrar\EPP;

class eppInfoBrOrgResponse extends eppInfoContactResponse {
    function __construct() {
        parent::__construct();
    }

    /**
     * Retrieve an array of domain names associated with this contact
     * @return BrOrg|null
     */
    public function getBrOrg() {
        if ($handle = $this->queryPath('/epp:epp/epp:response/epp:extension/brorg:creData/brorg:organization')) {
            return new brOrg($handle);
        }
        return null;
    }
}
