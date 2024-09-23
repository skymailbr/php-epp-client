<?php

namespace Metaregistrar\EPP;

/**
 * @see https://ftp.registro.br/pub/libepp-nicbr/draft-neves-epp-brdomain-05.txt
 */
class brDomain extends eppDomain
{
    private $ticketNumber;

    private $organization;

    private $releaseProcessFlags;

    private $pending;

    private $doc;

    private $releaseProc;

    private $ns;

    private $autoRenew;

    /**
     * @param string $domainname
     * @param string|null $registrant
     * @param array|null $contacts
     * @param array|null $hosts
     * @param int $period
     * @param string|null $authorisationCode
     * @throws eppException
     */
    public function __construct(string $domainname, string $registrant = null, array $contacts = null, array $hosts = null, int $period = 0, string $authorisationCode = null)
    {
        parent::__construct($domainname, $registrant, $contacts, $hosts, $period, $authorisationCode);
    }

    /**
     * @return string
     */
    public function getTicketNumber(): string
    {
        return $this->ticketNumber;
    }

    /**
     * @param string $ticketNumber
     */
    public function setTicketNumber(string $ticketNumber): void
    {
        $this->ticketNumber = $ticketNumber;
    }

    /**
     * @return string
     */
    public function getOrganization(): string
    {
        return $this->organization;
    }

    /**
     * @param string $organization
     */
    public function setOrganization(string $organization): void
    {
        $this->organization = $organization;
    }

    /**
     * @return array
     */
    public function getReleaseProcessFlags(): array
    {
        return $this->releaseProcessFlags;
    }

    /**
     * @param array $releaseProcessFlags
     */
    public function setReleaseProcessFlags(array $releaseProcessFlags): void
    {
        $this->releaseProcessFlags = $releaseProcessFlags;
    }

    /**
     * @return array
     */
    public function getPending(): array
    {
        return $this->pending;
    }

    /**
     * @param array $pending
     */
    public function setPending(array $pending): void
    {
        $this->pending = $pending;
    }

    /**
     * @return array
     */
    public function getDoc(): array
    {
        return $this->doc;
    }

    /**
     * @param array $doc
     */
    public function setDoc(array $doc): void
    {
        $this->doc = $doc;
    }

    /**
     * @return array
     */
    public function getReleaseProc(): array
    {
        return $this->releaseProc;
    }

    /**
     * @param array $releaseProc
     */
    public function setReleaseProc(array $releaseProc): void
    {
        $this->releaseProc = $releaseProc;
    }

    /**
     * @return array
     */
    public function getNs(): array
    {
        return $this->ns;
    }

    /**
     * @param array $ns
     */
    public function setNs(array $ns): void
    {
        $this->ns = $ns;
    }

    public function setAutoRenew(string $autoRenew): void
    {
        $this->autoRenew = $autoRenew;
    }

    public function getAutoRenew(): string
    {
        return $this->autoRenew;
    }
}
