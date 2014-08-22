<?php

namespace lib\Classes;


class Phone {

    private $userId;
    private $phoneType;
    private $phoneNumber;

    /**
     * @param mixed $phoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param mixed $phoneType
     */
    public function setPhoneType($phoneType)
    {
        $this->phoneType = $phoneType;
    }

    /**
     * @return mixed
     */
    public function getPhoneType()
    {
        return $this->phoneType;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

} 