<?php

namespace App\Models;

use App\Database\Conn;

class CrudModel extends Conn
{
  /** 
   * método para atualizar informações
   * $table recebe o nome da tabela
   * $data recebe array com nome das calunas e valores
   */
  public function update($data, $table, $id)
  {
    $res = $this->db()
      ->update($table)
      ->where('id')->is($id)
      ->set($data);

    return $res;
  }

  /** 
   * método para adicionar informações
   * $table recebe o nome da tabela
   * $data recebe array com nome das calunas e valores
   */
  public function add(array $data, $table)
  {
    $res = $this->db()
      ->insert($data)
      ->into($table);

    return $res;
  }

  /** 
   * método para leitura das informações
   * $table recebe o nome da tabela
   * recebe nome da table, nome da coluna e id
   */
  public function read($table, $column, $value)
  {
    $res = $this->db()
    ->from($table)
    ->where($column)->is($value)
    ->select()
    ->all();

    return $res;
  }

  /** 
   * método para deletar informações
   */
  public function delete($table, $id)
  {
    $res = $this->db()
    ->from($table)
    ->where('id')->is($id)
    ->delete();

    return $res;
  }

  /** 
   * método para leitura das informações de dois valores
   * $table recebe o nome da tabela
   * recebe nome da table, nome da coluna e id
   */
  public function read2values($table, $column1, $column2, $value1, $value2)
  {
    $res = $this->db()
    ->from($table)
    ->where($column1)->is($value1)
    ->where($column2)->is($value2)
    ->select()
    ->all();

    return $res;
  }
}
