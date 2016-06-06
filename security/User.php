<?php

namespace SYSTEM\SECURITY;

class User {

    public $id = NULL;
    public $username = NULL;
    public $email = NULL;
    public $creationDate = NULL;
    public $lastLoginDate = NULL;
    public $lastLoginIP = NULL;
    public $passwordWrongCount = NULL;
    public $rights = NULL;
    public $locale = NULL;
    public $base_url = NULL;
    public $email_confirmed = NULL;

    public function __construct($id, $username, $email, $creationDate, $lastLoginDate, $lastLoginIP, $passwordWrongCount, $rights, $locale, $base_url, $email_confirmed){
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->creationDate = $creationDate;
        $this->lastLoginDate = $lastLoginDate;
        $this->lastLoginIP = $lastLoginIP;
        $this->passwordWrongCount = $passwordWrongCount;
        $this->rights = $rights;
        $this->locale = $locale;
        $this->base_url = $base_url;
        $this->email_confirmed = $email_confirmed;
    }
}