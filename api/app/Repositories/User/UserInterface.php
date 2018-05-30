<?php

namespace App\Repositories\User;


interface UserInterface
{
  public function getAll();

  public function ById($id);

  public function create(array $data);

  public function update(array $data);

  public function delete(array $data);
}
