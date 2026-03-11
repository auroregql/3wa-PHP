<?php

class Weapon
{
    private $name;
    private $damages;

    public function __construct($name, $damages)
    {
        $this->name = $name;
        $this->damages = $damages;
    }
    
   public function getName()
    {
        return $this->name;
    }
    
     public function setName($name)
    {
        $this->name = $name;
    }
    
    
    public function getDamages()
    {
        return $this->damages;
    }
    
     public function setDamages($damages)
    {
        $this->damages = $damages;
    }
    
    public function strike()
    {
        return "Mais aïeuh! <br>";
    }
    
}
    
?>