<?php
/**
 * Represents a cluster being managed by the server directory.
 *
 * Copyright (c) 2011 Eric Barr <eb@anhstudios.com>
 */

namespace Anh\GalaxyManagerBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="cluster")
 */
class Cluster
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length="100")
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length="100")
     */
    protected $version;

    /**
     * @ORM\Column(type="integer")
     */
    protected $status;
    
    /**
     * @ORM\Column(type="datetime", name="created_at")
     */
    protected $createdAt;

    /**
     * @ORM\Column(type="datetime", name="updated_at")
     */
    protected $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity="Process")
     * @ORM\JoinColumn(name="primary_id", referencedColumnName="id")
     */
    protected $primaryProcess;

    /**
     * @ORM\OneToMany(targetEntity="Process", mappedBy="cluster")
     */
    protected $processes;

    public function __construct()
    {
        $this->processes = new ArrayCollection();
    }

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
     * Set version
     *
     * @param string $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * Get version
     *
     * @return string $version
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
     * Set primaryProcess
     *
     * @param Anh\ServerDirectoryBundle\Entity\Process $primaryProcess
     */
    public function setPrimaryProcess(\Anh\ServerDirectoryBundle\Entity\Process $primaryProcess)
    {
        $this->primaryProcess = $primaryProcess;
    }

    /**
     * Get primaryProcess
     *
     * @return Anh\ServerDirectoryBundle\Entity\Process $primaryProcess
     */
    public function getPrimaryProcess()
    {
        return $this->primaryProcess;
    }

    /**
     * Add processes
     *
     * @param Anh\ServerDirectoryBundle\Entity\Process $processes
     */
    public function addProcesses(\Anh\ServerDirectoryBundle\Entity\Process $processes)
    {
        $this->processes[] = $processes;
    }

    /**
     * Get processes
     *
     * @return Doctrine\Common\Collections\Collection $processes
     */
    public function getProcesses()
    {
        return $this->processes;
    }
}