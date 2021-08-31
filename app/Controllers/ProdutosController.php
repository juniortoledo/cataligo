<?php

namespace App\Controllers;

use App\Utils\View;
use App\Models\CrudModel;
use App\Controllers\UploadController;

class ProdutosController extends View
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
    $produtos = $this->crud->read('produtos', 'id_user', $_SESSION['id']);
    $categorias = $this->crud->read('categorias', 'id_user', $_SESSION['id']);

    if($categorias) {
      echo $this->view->render('painel/produtos/home', [
        'produtos' => $produtos,
        'categorias' => $categorias
      ]);
    } else {
      header('location:'.URL.'categorias');
    }
  }

  /** view editar */
  public function editar($data)
  {
    // categoria
    $produto = $this->crud->read('produtos', 'id', $data['id']);

    echo $this->view->render('painel/produtos/editar', ['produto' => $produto]);
  }

  /** view deletar */
  public function deletar($data)
  {
    echo $this->view->render('painel/produtos/deletar', ['id' => $data['id']]);
  }

  /**
   * gravar nova categoria
   */
  public function addData($data)
  {
    $upload = new UploadController();

    $this->crud->add([
      'id_user' => $_SESSION['id'],
      'name' => $data['name'],
      'categoria' => $data['categoria'],
      'sobre' => $data['sobre'],
      'valor' => $data['valor'],
      'status' => $data['status'],
      'image' => $upload->file($_FILES['image'])
    ], 'produtos');

    header('location:'.URL.'produtos');
  }

  /**
   * editar informações no banco
   */
  public function editData($data)
  {
    $res = $this->crud->update([
      'name' => $data['name']
    ], 'categorias', $data['id']);

    if($res) header('location:'.URL.'categorias/editar/'.$data['id'].'?success');
  }

  /**
   * deletar categoria
   */
  public function delData($data)
  {
    $produtos = $this->crud->read('produtos', 'id', $data['id']);
    $upload = new UploadController();

    // deleta o produto
    foreach($produtos as $item) {
      $upload->delete($item->image);
      $this->crud->delete('produtos', 'id', $item->id);
    }

    header('location:'.URL.'produtos');
  }
}
    