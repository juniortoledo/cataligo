<?php

namespace App\Controllers;

use App\Utils\View;
use App\Models\CrudModel;

class PedidosController extends View
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
    $perfil = $this->crud->read('perfil', 'id_user', $_SESSION['id']);

    if ($this->crud->read('perfil', 'id_user', $_SESSION['id'])) {
      echo $this->view->render('painel/pedidos/home', ['perfil' => $perfil]);
    } else {
      echo $this->view->render('painel/perfil/novo', ['perfil' => $perfil]);
    }
  }

  /**
   * altera o status da loja
   */
  public function status()
  {
    $status = $this->crud->read('perfil', 'id_user', $_SESSION['id']);

    foreach ($status as $item) {
      $item->status ? $this->crud->update(['status' => 0], 'perfil', $item->id) : $this->crud->update(['status' => 1], 'perfil', $item->id);
      header('location:'.URL.'pedidos');
    }
  }

  /**
   * editar informações no banco
   */
  public function editData($data)
  {
    $res = $this->crud->update($data, 'Nome_da_tabela', 'id_da_coluna');

    if ($res) header('location:' . URL . 'Extenção_da_URL');
  }

  /**
   * ler informações no banco
   */
  public function readData($data)
  {
    $res = $this->crud->read('Nome_da_tabela', 'Nome_da_coluna', 'id_da_coluna');

    return $res;
  }

  /**
   * deletar informações no banco
   */
  public function delData($data)
  {
    $res = $this->crud->delete('Nome_da_tabela', 'id_da_coluna');

    if ($res) header('location:' . URL . 'Extenção_da_URL');
  }
}
