<?php
namespace Engine\Routing;

class Request
{
    protected $path;
    protected $get_params;
    protected $post_params;

    public function __construct()
    {
        $this->path = $_GET['path'];
        $this->get_params = $_GET;
        unset($this->get_params['path']);
        $this->post_params = $_POST;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return mixed
     */
    public function getGetParams()
    {
        return $this->get_params;
    }

    /**
     * @return mixed
     */
    public function getPostParams()
    {
        return $this->post_params;
    }



}