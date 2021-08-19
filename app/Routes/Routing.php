<?php

namespace App\Routes;

use CoffeeCode\Router\Router;

use function App\Config\session;

class Routing
{
  public $router;

  public function __construct()
  {
    $this->router = new Router(URL);
    $this->router->namespace('App\Controllers');

    //auth
    $this->router->get('/', 'AuthController:home');
    $this->router->get('/login', 'AuthController:login');
    $this->router->post('/login', 'AuthController:readUser');
    $this->router->post('/register', 'AuthController:addUser');

    // perfil
    $this->router->post('/perfil', 'PerfilController:addData');

    // pedidos
    $this->router->get('/pedidos', $this->auth('PedidosController:home'));

    $this->router->get('/status', $this->auth('PedidosController:status'));

    //erros
    $this->router->get('/error', 'AuthController:error');

    //migrations
    $this->router->get('/migration', 'MigrationController:create');

    // sair
    $this->router->get('/sair', function() {
      session_destroy();

      header('location:'. URL);
    });

    //create controller
    $this->router->get('/controller', 'AuthController:controller');
    $this->router->post('/controller/create', 'CreateController:create');

    $this->router->dispatch();

    //rota para erros, urls não existenste
    if ($this->router->error()) {
      $this->router->redirect('/error');
    }
  }

  /** auth routes */
  public function auth($controller)
  {
    if (isset($_SESSION['user'])) {
      return $controller;
    } else {
      return 'AuthController:home';
    }
  }
}
