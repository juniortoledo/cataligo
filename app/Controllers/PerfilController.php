<?php

namespace App\Controllers;

use App\Utils\View;
use App\Models\CrudModel;
use App\Controllers\UploadController;

class PerfilController extends View
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
    echo $this->view->render('path/home', ['perfil' => $perfil]);
  }

  /**
   * gravar informações no banco
   */
  public function addData($data)
  {
    $upload = new UploadController();

    $res = $this->crud->add([
      'id_user' => $_SESSION['id'],
      'name' => $data['name'],
      'sobre' => $data['sobre'],
      'estado' => $data['estado'],
      'cidade' => $data['cidade'],
      'bairro' => $data['bairro'],
      'rua' => $data['rua'],
      'complemento' => $data['complemento'],
      'numero' => $data['numero'],
      'image' => $upload->file($_FILES['image']),
      'status' => 0
    ], 'perfil');

    if($res) header('location:'.URL.'pedidos');
  }

  /**
   * editar informações no banco
   */
  public function editData($data)
  {
    $res = $this->crud->update($data, 'Nome_da_tabela', 'id_da_coluna');

    if($res) header('location:'.URL.'Extenção_da_URL');
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

    if($res) header('location:'.URL.'Extenção_da_URL');
  }
}
    