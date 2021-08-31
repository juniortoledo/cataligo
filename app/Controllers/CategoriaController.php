<?php

namespace App\Controllers;

use App\Utils\View;
use App\Models\CrudModel;
use App\Controllers\UploadController;

class CategoriaController extends View
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
    $categorias = $this->crud->read('categorias', 'id_user', $_SESSION['id']);

    echo $this->view->render('painel/categoria/home', ['categorias' => $categorias]);
  }

  /** view editar */
  public function editar($data)
  {
    // categoria
    $produtos = $this->crud->read('produtos', 'id', $data['id']);

    echo $this->view->render('painel/produtos/editar', ['produtos' => $produtos]);
  }

  /** view deletar */
  public function deletar($data)
  {
    echo $this->view->render('painel/categoria/deletar', ['id' => $data['id']]);
  }

  /**
   * gravar nova categoria
   */
  public function addData($data)
  {
    $this->crud->add([
      'id_user' => $_SESSION['id'],
      'name' => $data['name']
    ], 'categorias');

    header('location:' . URL . 'categorias');
  }

  /**
   * editar informações no banco
   */
  public function editData($data)
  {
    $res = $this->crud->update([
      'name' => $data['name']
    ], 'categorias', $data['id']);

    if ($res) header('location:' . URL . 'categorias/editar/' . $data['id'] . '?success');
  }

  /**
   * deletar categoria
   */
  public function delData($data)
  {
    $produtos = $this->crud->read('produtos', 'id_user', $_SESSION['id']);
    $upload = new UploadController();

    foreach ($produtos as $key => $item) {
      if ($item->categoria === $data['id']) {
        $this->crud->delete('produtos', 'categoria', $item->categoria);
        $upload->delete($item->image);
      }
    }

    // deleta a categoria
    $this->crud->delete('categorias', 'id', $data['id']);

    header('location:' . URL . 'categorias');
  }
}
