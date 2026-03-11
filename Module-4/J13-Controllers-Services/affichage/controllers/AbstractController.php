<?php

abstract class AbstractController
{
    protected function render(string $template, array $data = [])
    {
        
        extract($data); 

        require "templates/layout.phtml";
    }
}

?>