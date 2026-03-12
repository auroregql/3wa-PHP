<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */

class UserManager extends AbstractManager {

    public function findOne(int $id): ?User {
        $query = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $query->execute(['id' => $id]);
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data ? new User($data) : null;
    }

    public function findByEmail(string $email): ?User {
        $query = $this->db->prepare("SELECT * FROM users WHERE email = :email");
        $query->execute(['email' => $email]);
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data ? new User($data) : null;
    }

    public function create(User $user): void {
        $query = $this->db->prepare("
            INSERT INTO users (username, email, password, role, created_at) 
            VALUES (:username, :email, :password, :role, :created_at)
        ");
        
        $query->execute([
            'username'   => $user->getUsername(),
            'email'      => $user->getEmail(),
            'password'   => $user->getPassword(),
            'role'       => $user->getRole(),
            'created_at' => $user->getCreatedAt()->format('Y-m-d H:i:s')
        ]);
        
        $user->setId($this->db->lastInsertId());
    }
}

?>