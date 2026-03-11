<?php 

class Character
{
    private $id;
    private $firstName = "Jane";
    private $lastName = "Doe";

    public function __construct($id)
    {
        $this->id = $id;
    }


    public function getId() : int
    {
        return $this->id;
    }

    public function setId (int $id) : void
    {
        $this->id = $id;
    }
    
    
    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }
    
    
    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }
    
    
     public function getFullName()
    {
        return $this->firstName . " " . $this->lastName;
    }

}

?>