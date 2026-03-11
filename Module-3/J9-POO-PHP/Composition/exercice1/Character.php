<?php

require_once "Weapon.php";

class Character
{
    private $name;
    private $weapon;

    public function __construct($name)
    {
        $this->name = $name;
        $this->weapon = new Weapon("", 0);
    }
    
     public function getName()
    {
        return $this->name;
    }
    
     public function setName($name)
    {
        $this->name = $name;
    }
    
    public function getWeapon()
    {
        return $this->weapon;
    }
    
     public function setWeapon($weapon)
    {
        $this->weapon = $weapon;
    }
    
    public function fight()
    {
        return $this->weapon->strike();
    }
}

?>