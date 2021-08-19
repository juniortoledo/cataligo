<?php

namespace App\Controllers;

use App\Database\Conn;
use Opis\Database\Schema\CreateTable;

ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

class MigrationController extends Conn
{
  /**
   * metodo que invoca os métodos de criação de tabelas
   */
  public function create()
  {
    if(!$this->table('users')) {
      $this->db()->schema()->create('users', function(CreateTable $table) {
        $table->integer('id')->primary()->autoincrement();
        $table->string('name');
        $table->string('email');
        $table->string('password');
        $table->string('created_at');
      });

      echo '<b>users</b> criada <br>';
    }

    // dados do perfil da loja
    if(!$this->table('perfil')) {
      $this->db()->schema()->create('perfil', function(CreateTable $table) {
        $table->integer('id')->primary()->autoincrement();
        $table->integer('id_user');
        $table->string('image');
        $table->string('name');
        $table->string('estado');
        $table->string('cidade');
        $table->string('bairro');
        $table->string('rua');
        $table->integer('numero');
        $table->string('complemento');
        $table->string('sobre');
        $table->string('avalicao');
        $table->boolean('status');
      });

      echo '<b>perfil</b> criada <br>';
    }
  }

  /**
   * verifica se a table já existe
   */
  public function table($name)
  {
    $res = $this->db()
      ->schema()
      ->hasTable($name);

    return $res;
  }
}
