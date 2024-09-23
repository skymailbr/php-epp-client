<?php
namespace Metaregistrar\EPP;

class eppInfoBrDomainResponse extends eppInfoDomainResponse {
    /**
     * Retrieve an array of domain names associated with this contact
     * @return brDomain|null
     */
    public function getBrDomain() {
        if (!$this->queryPath('/epp:epp/epp:response/epp:extension/brdomain:infData')) {
            return null;
        }

        $brDomain = new brDomain($this->getDomainName());
        if ($organization = $this->getBrDomainOrganization()) {
            $brDomain->setOrganization($organization);
        }
        if ($ticketNumber = $this->getBrDomainTicketNumber()) {
            $brDomain->setTicketNumber($ticketNumber);
            $brDomain->setReleaseProcessFlags($this->getBrDomainPublicationFlags());
        }
        $brDomain->setAutoRenew($this->getBrDomainAutoRenew());
        return $brDomain;
    }

    public function getBrDomainOrganization() {
        $xpath = $this->xPath();
        $result = $xpath->query('/epp:epp/epp:response/epp:extension/brdomain:infData/brdomain:organization');
        $organization = null;
        foreach ($result as $organization) {
            /* @var $organization \DOMElement */
            if ($organization->nodeValue) {
                $organization = $organization->nodeValue;
            }
        }
        return $organization;
    }

    public function getBrDomainTicketNumber() {
        $xpath = $this->xPath();
        $result = $xpath->query('/epp:epp/epp:response/epp:extension/brdomain:infData/brdomain:ticketNumber');
        $ticketNumber = null;
        foreach ($result as $ticketNumber) {
            /* @var $ticketNumber \DOMElement */
            if ($ticketNumber->nodeValue) {
                $ticketNumber = $ticketNumber->nodeValue;
            }
        }
        return $ticketNumber;
    }

    public function getBrDomainPublicationFlags(): array {
        $xpath = $this->xPath();
        $result = $xpath->query('/epp:epp/epp:response/epp:extension/brdomain:infData/brdomain:releaseProcessFlags');
        $flags = [];
        foreach ($result as $releaseProcessFlag) {
            /* @var $releaseProcessFlag \DOMElement */
            if (($releaseProcessFlag->nodeValue) && (strlen($releaseProcessFlag->nodeValue) > 0)) {
                $releaseProcessFlag1 = $releaseProcessFlag->getAttribute('flag1');
                if ($releaseProcessFlag1) {
                    $flags['flag1'] = 1;
                }
                $releaseProcessFlag2 = $releaseProcessFlag->getAttribute('flag2');
                if ($releaseProcessFlag2) {
                    $flags['flag2'] = 2;
                }
                $releaseProcessFlag3 = $releaseProcessFlag->getAttribute('flag3');
                if ($releaseProcessFlag3) {
                    $flags['flag3'] = 3;
                }
            }
        }
        return $flags;
    }

    public function getBrDomainAutoRenew(): string {
        $xpath = $this->xPath();
        $getAutoRenew = $xpath->query('/epp:epp/epp:response/epp:extension/brdomain:infData/brdomain:autoRenew/@active');
        if (isset($getAutoRenew[0])) {
            return (string) $getAutoRenew[0]->nodeValue;
        }

        return '0';
    }
}
