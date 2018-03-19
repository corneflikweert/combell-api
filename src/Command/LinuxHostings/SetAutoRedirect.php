<?php

namespace TomCan\CombellApi\Command\LinuxHostings;

use TomCan\CombellApi\Command\AbstractCommand;

class SetAutoRedirect extends AbstractCommand
{

    private $domainname;
    private $hostname;
    private $enabled;

    public function __construct($domainname, $hostname, $enabled)
    {
        parent::__construct("put", "/v2/linuxhostings/{domainname}/sslsettings/{hostname}/autoredirect");

        $this->setDomainname($domainname);
        $this->setHostname($hostname);
        $this->setEnabled($enabled);
    }

    public function prepare()
    {

        $this->setEndPoint("/v2/linuxhostings/".$this->domainname."/sslsettings/".$this->hostname."/autoredirect");

        $obj = new \stdClass();
        $obj->enabled = $this->enabled;

        $this->setBody(
            json_encode($obj)
        );

    }

    /**
     * @return mixed
     */
    public function getDomainname()
    {
        return $this->domainname;
    }

    /**
     * @param mixed $domainname
     */
    public function setDomainname($domainname)
    {
        $this->domainname = $domainname;
    }

    /**
     * @return mixed
     */
    public function getHostname()
    {
        return $this->hostname;
    }

    /**
     * @param mixed $hostname
     */
    public function setHostname($hostname)
    {
        $this->hostname = $hostname;
    }

    /**
     * @return mixed
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param mixed $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    }

}