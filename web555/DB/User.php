<?php

require_once 'QueryBuilder.php';

class User extends QueryBuilder
{
    public $rawPassword;

    public $id;

    public function __construct(protected $login, protected $password)
    {
        parent::__construct();
    }

    public function create()
    {
        $this->id = QueryBuilder::insertRaw("
                insert into `users` (`login`, `password`) 
                values ('$this->login', '$this->password')
            ");
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getId(): int
    {
        return $this->id;
    }
}