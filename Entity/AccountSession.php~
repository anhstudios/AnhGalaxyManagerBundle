<?php
/**
 * Represents an account session
 *
 * Copyright (c) 2011 Kyle Craviotto <kyle@anhstudios.com>
 */

namespace Anh\GalaxyManagerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="account_session")
 */
class AccountSession
{
    /**
     * @ORM\Id
     * @ORM\Column(type="bigint")
     * @ORM\generatedValue(strategy="AUTO")
     */
    protected $id;

    /**
     *  @ORM\ManyToOne(targetEntity="Account", inversedBy="sessions")
     *  @ORM\JoinColumn(name="account_id", referencedColumnName="id")
     *  @ORM\Column(type="integer")
     *
     */
    protected $account;
    
    /**
     *  @ORM\Column(type="string", length="100")
     */
    protected $session_key;

    /**
     * Get id
     *
     * @return bigint 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set session_key
     *
     * @param string $sessionKey
     */
    public function setSessionKey($sessionKey)
    {
        $this->session_key = $sessionKey;
    }

    /**
     * Get session_key
     *
     * @return string 
     */
    public function getSessionKey()
    {
        return $this->session_key;
    }

    /**
     * Set account
     *
     * @param integer $account
     */
    public function setAccount($account)
    {
        $this->account = $account;
    }

    /**
     * Get account
     *
     * @return integer 
     */
    public function getAccount()
    {
        return $this->account;
    }
}