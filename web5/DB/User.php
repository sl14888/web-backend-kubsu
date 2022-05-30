<?php

    require_once 'QueryBuilder.php';

    class User extends QueryBuilder
    {
        public $rawPassword;
        
        public $login;
            
        public $password;

        public $id;

        public function __construct($login, $password) {
            parent::__construct();
            $this->login=$login;
            $this->password=$password;
        }

        public function create() {
            $this->id = QueryBuilder::insertRaw("
                insert into `users` (`login`, `password`) 
                values ('$this->login', '$this->password')
            ");
        }

        /**
         * @return string
         */
        public function getLogin(): string {
            return $this->login;
        }

        /**
         * @return string
         */
        public function getPassword(): string {
            return $this->password;
        }

        public function getId(): int {
            return $this->id;
        }
    }
