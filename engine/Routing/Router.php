<?php
namespace Engine\Routing;

class Router
{

    //наши пути из экземляров класса Route
    static protected $routes = [];
    protected $request = '';

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public static function addRoute($route)
    {
        array_push(self::$routes, $route);
    }

    public function run()
    {
        //см. описание метода ниже; находим выполяющий Route
        $exec_route = $this->findRoute();

        if($exec_route)
        {
            //берем название метода из выполняющего роута
            $action = $exec_route->getAction() . 'Action';
            //берем название контроллера из выполняющего роута
            $nameController = $exec_route->getController();
            //берем пространство имен нужного нам контроллера
            $namespace = '\Application\Controllers\\';
            //создаем контроллер полученный из выполняющего роута
            $controllerPath = $namespace . $nameController;
            $controller = new $controllerPath();

            //проверяем наличие метода в полученом контроллере
            if(method_exists($controller, $action))
            {
                //создаем массив параметров для метода контроллера
                $controllerParams = [];
                //берем названия параметров из Route
                $nameParams = $exec_route->getParams();
                //находим значения переданных в uri параметров
                preg_match($exec_route->getMask(), $this->request->getPath(), $valueParams);
                //если в uri есть параметры

                if(count($valueParams) > 0)
                {
                    //убераем первый ненужный элемент массива значений параметров
                    array_shift($valueParams);
                    //перебираем параметры из Route и наполним массив параметров для контроллера
                    $i = 0;
                    foreach ($nameParams as $name)
                    {
                        $controllerParams[$name] = $valueParams[$i];
                        $i++;
                    }
                }

                //вызываем метод нужного контроллера с параметрами
                $controller->$action($controllerParams);

            } else {
                echo 'метод ' . $action . ' не найден в контроллере ' . get_class($controller);
            }
        } else {
            echo 'route для ' . $this->request->getPath() . ' не найден';
        }

    }

    private function findRoute()
    {
        //перебираем набор путей из свойста Router
        //находим исполняющий путь сравнивая маску пути с uri из Request
        $exec_route = '';
        foreach (self::$routes as $route)
        {
            if(preg_match($route->getMask(), $this->request->getPath(), $match))
            {
                $exec_route = $route;
                return $exec_route;
            }
        }
    }
}