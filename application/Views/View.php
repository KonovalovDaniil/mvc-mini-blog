<?php
namespace Application\Views;

class View
{
    public function render($name, $data = [])
    {
        extract($data);
        require $name.'.php';
    }

}