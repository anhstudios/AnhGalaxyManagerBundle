<?php
/**
 * Represents a process being managed by the server directory.
 *
 * Copyright (c) 2011 Eric Barr <eb@anhstudios.com>
 */

namespace Anh\GalaxyManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="service")
 */
class Service
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length="255")
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length="255")
     */
    protected $type;

    /**
     * @orm\Column(type="bigint")
     */
    protected $address;

    /**
     * @ORM\Column(type="integer", name="tcp_port")
     */
    protected $tcpPort;

    /**
     * @ORM\Column(type="integer", name="udp_port")
     */
    protected $udpPort;

    /**
     * @ORM\Column(type="integer", name="ping_port")
     */
    protected $pingPort;

    /**
     * @ORM\Column(type="integer")
     */
    protected $version;

    /**
     * @ORM\Column(type="integer")
     */
    protected $status;

    /**
     * @ORM\Column(type="decimal", name="last_pulse", precision="17", scale="3")
     */
    protected $lastPulse;

    /**
     * @ORM\Column(type="datetime", name="created_at")
     */
    protected $createdAt;

    /**
     * @ORM\Column(type="datetime", name="updated_at")
     */
    protected $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity="Galaxy", inversedBy="services")
     * @ORM\JoinColumn(name="galaxy_id", referencedColumnName="id")
     */
    protected $galaxy;

    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set type
     *
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Get type
     *
     * @return string $type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set address
     *
     * @param bigint $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * Get address
     *
     * @return bigint $address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set tcpPort
     *
     * @param integer $tcpPort
     */
    public function setTcpPort($tcpPort)
    {
        $this->tcpPort = $tcpPort;
    }

    /**
     * Get tcpPort
     *
     * @return integer $tcpPort
     */
    public function getTcpPort()
    {
        return $this->tcpPort;
    }

    /**
     * Set udpPort
     *
     * @param integer $udpPort
     */
    public function setUdpPort($udpPort)
    {
        $this->udpPort = $udpPort;
    }

    /**
     * Get udpPort
     *
     * @return integer $udpPort
     */
    public function getUdpPort()
    {
        return $this->udpPort;
    }

    /**
     * Set pingPort
     *
     * @param integer $pingPort
     */
    public function setPingPort($pingPort)
    {
        $this->pingPort = $pingPort;
    }

    /**
     * Get pingPort
     *
     * @return integer $pingPort
     */
    public function getPingPort()
    {
        return $this->pingPort;
    }

    /**
     * Set version
     *
     * @param integer $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * Get version
     *
     * @return integer $version
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set status
     *
     * @param integer $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Get status
     *
     * @return integer $status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set lastPulse
     *
     * @param decimal $lastPulse
     */
    public function setLastPulse($lastPulse)
    {
        $this->lastPulse = $lastPulse;
    }

    /**
     * Get lastPulse
     *
     * @return decimal $lastPulse
     */
    public function getLastPulse()
    {
        return $this->lastPulse;
    }

    /**
     * Set createdAt
     *
     * @param datetime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Get createdAt
     *
     * @return datetime $createdAt
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param datetime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Get updatedAt
     *
     * @return datetime $updatedAt
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set galaxy
     *
     * @param Anh\GalaxyManagerBundle\Entity\Galaxy $galaxy
     */
    public function setGalaxy(\Anh\GalaxyManagerBundle\Entity\Galaxy $galaxy)
    {
        $this->galaxy = $galaxy;
    }

    /**
     * Get galaxy
     *
     * @return Anh\GalaxyManagerBundle\Entity\Galaxy $galaxy
     */
    public function getGalaxy()
    {
        return $this->galaxy;
    }
}