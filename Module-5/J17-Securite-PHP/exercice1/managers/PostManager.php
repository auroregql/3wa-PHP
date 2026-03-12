<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */

class PostManager extends AbstractManager {

    public function findLatest(): array {
        $query = $this->db->query("SELECT * FROM posts ORDER BY created_at DESC LIMIT 4");
        $results = $query->fetchAll(PDO::FETCH_ASSOC);

        $posts = [];
        foreach ($results as $data) {
            $posts[] = $this->hydrateFullPost($data);
        }
        return $posts;
    }

    public function findOne(int $id): ?Post {
        $query = $this->db->prepare("SELECT * FROM posts WHERE id = :id");
        $query->execute(['id' => $id]);
        $data = $query->fetch(PDO::FETCH_ASSOC);

        return $data ? $this->hydrateFullPost($data) : null;
    }

    public function findByCategory(int $categoryId): array {
        $query = $this->db->prepare("
            SELECT p.* FROM posts p
            JOIN posts_categories pc ON p.id = pc.post_id
            WHERE pc.category_id = :category_id
        ");
        $query->execute(['category_id' => $categoryId]);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);

        $posts = [];
        foreach ($results as $data) {
            $posts[] = $this->hydrateFullPost($data);
        }
        return $posts;
    }

    private function hydrateFullPost(array $data): Post {
        $post = new Post($data);

        $userManager = new UserManager();
        $author = $userManager->findOne($data['author']);
        $post->setAuthor($author);

        $categoryManager = new CategoryManager();
        $categories = $categoryManager->findByPost($post->getId());
        $post->setCategories($categories);

        return $post;
    }
}

?>