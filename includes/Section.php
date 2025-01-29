<?php
class Section {
    private $conn;
    private $table_name = "sections"; 

    public $id;
    public $title;
    public $content;

    public function __construct($db) {
        $this->db = $db;
    }

   
    public function addSection($name, $content) {
        
        $query = "INSERT INTO sections ( name, content) VALUES ( :name, :content)";
        $stmt = $this->db->prepare($query); 

        
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':content', $content);

      
        return $stmt->execute();
    }
    public function getSectionByName($name) {
        $query = "SELECT * FROM sections WHERE name = :name LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC); 
    }
    public function getSectionById($id) {
        $query = "SELECT * FROM sections WHERE id = :id LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    
        return $stmt->fetch(PDO::FETCH_ASSOC); 
    }
    public function readAll() {
        $query = "SELECT id, name , content FROM " . $this->table_name;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt;
    }
 
    public function updateSection($id, $name, $content) {
        $query = "UPDATE sections SET name = :name, content = :content WHERE id = :id";
        $stmt = $this->db->prepare($query);
      
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':content', $content);

        return $stmt->execute();
    }
    
    public function deleteSection($id) {
        $query = "DELETE FROM sections WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
        return $stmt->execute();
    }

public function getPortfolioImages() {
    $query = "SELECT * FROM portfolio_images"; 
    $stmt = $this->db->prepare($query);
    $stmt->execute();

    return $stmt; 
}

}

?>
