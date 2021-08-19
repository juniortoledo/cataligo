<?php

namespace App\Controllers;

use App\Utils\View;
use App\Models\CrudModel;

class AuthController extends View
{
  private $crud;
  public function __construct()
  {
    $this->crud = new CrudModel();
    parent::__construct();
  }

  /** view home */
  public function home()
  {
    echo $this->view->render('auth/home');
  }

  /** view login */
  public function login()
  {
    echo $this->view->render('auth/login');
  }

  /** view error */
  public function error()
  {
    echo $this->view->render('auth/error');
  }

  /**
   * gravar informações no banco
   */
  public function addUser($data)
  {
    $check = $this->crud->read('users', 'email', $data['email']);

    // verifica se o email informado já existe
    if ($check) {
      header('location:' . URL . '?error');
    } else {
      $this->crud->add([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => md5($data['password']),
        'created_at' => date('d-m-Y')
      ], 'users');

      header('location:' . URL . 'login?success');
    }
  }

  /**
   * ler informações no banco
   */
  public function readUser($data)
  {
    $user = $this->crud->read2values('users', 'email', 'password', $data['email'], md5($data['password']));

    // checa se email e senha existem
    if ($user) {
      foreach ($user as $item) {
        $_SESSION['user'] = true;
        $_SESSION['id'] = $item->id;
        $_SESSION['name'] = $item->name;

        //redireciona para a home depedidos
        header('location: ' . URL . 'pedidos');
      }
    } else {
      header('location: ' . URL . 'login?error');
    }
  }
}
