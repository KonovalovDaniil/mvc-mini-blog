<?php
namespace Engine\Routing;

class Route
{
    public $path;
    public $action;
    public $controller;

    public function __construct($path, $action, $controller)
    {
        $this->path = $path;
        $this->action = $action;
        $this->controller = $controller;
    }

    public function getParams()
    {
        preg_match_all('/{(.+?)}/', $this->path, $match);
        return $match[1];
    }

    public function getMask()
    {
        $path = $this->path;
        $path = preg_replace('/{[a-z]\w*}/', '(\w*)', $path);
        return '~' . $path .'/?$~';
    }


    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param mixed $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param mixed $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @param mixed $controller
     */
    public function setController($controller)
    {
        $this->controller = $controller;
    }
}