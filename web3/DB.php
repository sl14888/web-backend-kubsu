<?php

class DB
{
    protected $pdo;

    public function __construct() {
        $user = 'u41802';
        $pass = '4104631';
        $this->pdo = new PDO('mysql:host=localhost;dbname=web-backend-kubsu', $user, $pass);
        echo $this->pdo->errorCode();
    }
    public function insert(array $values, string $table): bool {
        $stmt = $this->pdo->prepare(
            "insert into $table (name, email, birthday, sex, count_hands, bio) 
            values (:name, :email, year(:birthday), :sex, :count_hands, :bio);"
        );

        return $stmt->execute($values);
    }
    public function insertIntoPivot(string $firstId, string $secondId): bool {
        $stmt = $this->pdo->prepare(
            'insert into superpower_request (request_id, superpower_id)
            values (?, ?)'
        );
        return $stmt->execute([
            $firstId,
            $secondId
        ]);
    }

    public function maxRequestId() {
        return $this->pdo->query('select count(*) from request')->fetch()[0];
    }
    public function getSuperpowers() {
        return $this->pdo->query('select * from superpowers')->fetchAll();
    }
}
