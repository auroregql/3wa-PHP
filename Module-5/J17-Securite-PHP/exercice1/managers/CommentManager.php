<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */

class CommentManager extends AbstractManager {

    public function findByPost(int $postId): array {
        $query = $this->db->prepare("SELECT * FROM comments WHERE post_id = :post_id");
        $query->execute(['post_id' => $postId]);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);

        $comments = [];
        $userManager = new UserManager();

        foreach ($results as $data) {
            $comment = new Comment($data);
            
            $user = $userManager->findOne($data['user_id']);
            $comment->setUser($user);
            
            $comments[] = $comment;
        }
        return $comments;
    }

    public function create(Comment $comment): void {
        $query = $this->db->prepare("
            INSERT INTO comments (content, user_id, post_id) 
            VALUES (:content, :user_id, :post_id)
        ");
        
        $query->execute([
            'content' => $comment->getContent(),
            'user_id' => $comment->getUser()->getId(),
            'post_id' => $comment->getPost()->getId()
        ]);
        
        $comment->setId($this->db->lastInsertId());
    }
}

?>