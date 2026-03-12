<?php
/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */
 
class Post {
    private ?int $id = null;
    private string $title;
    private string $excerpt;
    private string $content;
    private DateTime $createdAt;

    private User $author; 
    private array $categories = []; 

    public function __construct(array $data = []) {
        if (!empty($data)) {

            if (isset($data['id'])) { $this->id = $data['id']; }
            if (isset($data['title'])) { $this->title = $data['title']; }
            if (isset($data['excerpt'])) { $this->excerpt = $data['excerpt']; }
            if (isset($data['content'])) { $this->content = $data['content']; }

            if (isset($data['created_at'])) {
                if (is_string($data['created_at'])) {
                    $this->createdAt = new DateTime($data['created_at']);
                } else {
                    $this->createdAt = $data['created_at'];
                }
            }

        }
    }

    public function getId(): ?int { return $this->id; }
    public function getTitle(): string { return $this->title; }
    public function getExcerpt(): string { return $this->excerpt; }
    public function getContent(): string { return $this->content; }
    public function getCreatedAt(): DateTime { return $this->createdAt; }
    public function getAuthor(): User { return $this->author; }
    public function getCategories(): array { return $this->categories; }

    public function setId(?int $id): void { $this->id = $id; }
    public function setTitle(string $title): void { $this->title = $title; }
    public function setExcerpt(string $excerpt): void { $this->excerpt = $excerpt; }
    public function setContent(string $content): void { $this->content = $content; }
    public function setCreatedAt(DateTime $createdAt): void { $this->createdAt = $createdAt; }

    public function setAuthor(User $author): void { 
        $this->author = $author; 
    }

    public function setCategories(array $categories): void { $this->categories = $categories; }
}

?>