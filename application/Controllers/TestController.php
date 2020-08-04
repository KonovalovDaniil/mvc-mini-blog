<?php
namespace Application\Controllers;

use Application\Views\View;
use Application\Models\BlogDB;

class TestController
{
    public function test($id)
    {
        echo 'test ' . $id;
    }

    public function testAction()
    {
        echo 'test ';
    }
}