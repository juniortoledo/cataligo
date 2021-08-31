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

    // catalogo
    $this->router->get('/categorias', $this->auth('CategoriaController:home'));
    $this->router->get('/categorias/deletar/{id}', $this->auth('CategoriaController:deletar'));
    $this->router->get('/categorias/editar/{id}', $this->auth('CategoriaController:editar'));
    $this->router->post('/categorias', $this->auth('CategoriaController:addData'));
    $this->router->post('/categorias/deletar', $this->auth('CategoriaController:delData'));
    $this->router->post('/categorias/editar', $this->auth('CategoriaController:editData'));

    // produtos
    $this->router->get('/produtos', $this->auth('ProdutosController:home'));
    $this->router->get('/produtos/editar/{id}', $this->auth('ProdutosController:editar'));
    $this->router->post('/produtos', $this->auth('ProdutosController:addData'));
    $this->router->get('/produtos/deletar/{id}', $this->auth('ProdutosController:delData'));
    $this->router->post('/produtos/editar', $this->auth('ProdutosController:editData'));

    // perfil
    $this->router->get('/perfil', $this->auth('PerfilController:home'));
    $this->router->post('/perfil', 'PerfilController:addData');
    $this->router->post('/perfil/editar', 'PerfilController:editData');
    $this->router->post('/perfil/editar/imagem', 'PerfilController:editImage');

    // pedidos
    $this->router->get('/pedidos', $this->auth('PedidosController:home'));

    $this->router->get('/status', $this->auth('PedidosController:status'));

    //erros
    $this->router->get('/error', 'AuthController:error');

    //migrations
    $this->router->get('/migration', 'MigrationController:create');

    // sair
    $this->router->get('/sair', function () {
      session_destroy();

      header('location:' . URL);
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
