<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */

class CategoryManager extends AbstractManager {

    public function findAll(): array {
        $query = $this->db->query("SELECT * FROM categories");
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        
        $categories = [];
        foreach ($results as $data) {
            $categories[] = new Category($data);
        }
        return $categories;
    }

    public function findOne(int $id): ?Category {
        $query = $this->db->prepare("SELECT * FROM categories WHERE id = :id");
        $query->execute(['id' => $id]);
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data ? new Category($data) : null;
    }

    public function findByPost(int $postId): array {
        $query = $this->db->prepare("
            SELECT c.* FROM categories c
            JOIN posts_categories pc ON c.id = pc.category_id
            WHERE pc.post_id = :post_id
        ");
        $query->execute(['post_id' => $postId]);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);

        $categories = [];
        foreach ($results as $data) {
            $categories[] = new Category($data);
        }
        return $categories;
    }
}

?>