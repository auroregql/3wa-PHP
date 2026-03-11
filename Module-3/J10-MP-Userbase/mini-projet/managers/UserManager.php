<?php

class UserManager
{
    
    /*Attributs*/
    private array $users = [];
    private PDO $db;

    /*Constructeur*/
     public function __construct()
    {
        $this->db = new PDO(
            "mysql:host=db.3wa.io;dbname=auroregicquelcolleu_userbase_poo;charset=utf8",
            "auroregicquelcolleu",
            "514b3eda307289da5b9ccb0a4735bcd4"
        );

        $this->db->setAttribute(
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION
        );
    }

    public function getUsers(): array
    {
        return $this->users;
    }

    public function setUsers(array $users): void
    {
        $this->users = $users;
    }

    public function loadUsers(): void {
   
    $sql = "SELECT * FROM users";
    $statement = $this->db->query($sql);

    $users = [];

    while ($data = $statement->fetch(PDO::FETCH_ASSOC)) {

        $user = new User(
            $data['username'],
            $data['email'],
            $data['password'],
            $data['role']
        );
        
        $users[] = $user;
    }

    $this->setUsers($users);
}

    public function saveUser(User $user): void
{
    $sql = "INSERT INTO users (username, email, password, role) 
            VALUES (:username, :email, :password, :role)";
    
    $stmt = $this->db->prepare($sql);
    $stmt->execute([
        ':username' => $user->getUsername(),
        ':email'    => $user->getEmail(),
        ':password' => $user->getPassword(),
        ':role'     => $user->getRole()
    ]);
    
    $id = $this->db->lastInsertId();

    $user->setId((int)$id);
}

    public function deleteUser(User $user): void {
        
    $sql = "DELETE FROM users WHERE id = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([':id' => $user->getId()]);
    }
    
}

?>