<?php

namespace Metaregistrar\EPP;

/**
 * @see https://ftp.registro.br/pub/libepp-nicbr/draft-neves-epp-brorg-06.txt
 */
class brOrg extends eppContact
{
    /*
     *
   S:       <brorg:organization>
   S:         005.506.560/0001-36
   S:       </brorg:organization>
   S:       <brorg:contact type="admin">fan</brorg:contact>
   S:       <brorg:responsible>John Doe</brorg:responsible>
   S:       <brorg:exDate>2006-06-06T06:00:00.0Z</brorg:exDate>
   S:       <brorg:domainName>antispam.br</brorg:domainName>
   S:       <brorg:domainName>cert.br</brorg:domainName>
   S:       <brorg:domainName>dns.br</brorg:domainName>
   S:       <brorg:domainName>nic.br</brorg:domainName>
   S:       <brorg:domainName>ptt.br</brorg:domainName>
   S:       <brorg:domainName>registro.br</brorg:domainName>
   S:       <brorg:asNumber>64500</brorg:asNumber>
   S:       <brorg:ipRange version="v4">
   S:         <brorg:startAddress>192.168.0.0</brorg:startAddress>
   S:         <brorg:endAddress>192.168.0.255</brorg:endAddress>
   S:       </brorg:ipRange>
   S:       <brorg:suspended>true</brorg:suspended>

     *
     */

    /** @var string */
    private $orgId;

    /** @var string */
    private $organization;

    /** @var string */
    private $contact;

    /** @var string */
    private $contactType;

    /** @var string */
    private $responsible;

    /** @var \DateTime */
    private $expirationDate;

    /** @var array */
    private $domainName;

    /** @var int */
    private $asNumber;

    /** @var boolean */
    private $suspended;

    /**
     * @param $postalInfo
     * @param $email
     * @param $voice
     * @param $fax
     * @param $password
     * @param $status
     */
    public function __construct($postalInfo = null, $email = null, $voice = null, $fax = null, $password = null, $status = null)
    {
        parent::__construct($postalInfo, $email, $voice, $fax, $password, $status);
    }

    /**
     * @return string
     */
    public function getOrgId(): string
    {
        return $this->orgId;
    }

    /**
     * @param string $orgId
     * @return brOrg
     */
    public function setOrgId(string $orgId): brOrg
    {
        $this->orgId = $orgId;
        return $this;
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
     * @return brOrg
     */
    public function setOrganization(string $organization): brOrg
    {
        $this->organization = $organization;
        return $this;
    }

    /**
     * @return string
     */
    public function getContact(): string
    {
        return $this->contact;
    }

    /**
     * @param string $contact
     * @return brOrg
     */
    public function setContact(string $contact): brOrg
    {
        $this->contact = $contact;
        return $this;
    }

    /**
     * @return string
     */
    public function getContactType(): string
    {
        return $this->contactType;
    }

    /**
     * @param string $contactType
     * @return brOrg
     */
    public function setContactType(string $contactType): brOrg
    {
        $this->contactType = $contactType;
        return $this;
    }

    /**
     * @return string
     */
    public function getResponsible(): string
    {
        return $this->responsible;
    }

    /**
     * @param string $responsible
     * @return brOrg
     */
    public function setResponsible(string $responsible): brOrg
    {
        $this->responsible = $responsible;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getExpirationDate(): \DateTime
    {
        return $this->expirationDate;
    }

    /**
     * @param \DateTime $expirationDate
     * @return brOrg
     */
    public function setExpirationDate(\DateTime $expirationDate): brOrg
    {
        $this->expirationDate = $expirationDate;
        return $this;
    }

    /**
     * @return array
     */
    public function getDomainName(): array
    {
        return $this->domainName;
    }

    /**
     * @param array $domainName
     * @return brOrg
     */
    public function setDomainName(array $domainName): brOrg
    {
        $this->domainName = $domainName;
        return $this;
    }

    /**
     * @return int
     */
    public function getAsNumber(): int
    {
        return $this->asNumber;
    }

    /**
     * @param int $asNumber
     * @return brOrg
     */
    public function setAsNumber(int $asNumber): brOrg
    {
        $this->asNumber = $asNumber;
        return $this;
    }

    /**
     * @return bool
     */
    public function isSuspended(): bool
    {
        return $this->suspended;
    }

    /**
     * @param bool $suspended
     * @return brOrg
     */
    public function setSuspended(bool $suspended): brOrg
    {
        $this->suspended = $suspended;
        return $this;
    }
}
