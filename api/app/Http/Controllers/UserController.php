<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Services\UserManagement\UserManagementInterface;

class UserController extends Controller
{
  private $UserManager;

  private $Input;

  public function __construct(UserManagementInterface $UserManager, Request $Input)
  {
    $this->UserManager = $UserManager;

    $this->Input = $Input;
  }

  public function login()
  {
    // return $this->Input->all();
    return $this->UserManager->login($this->Input->all());
  }

  public function getUsers()
  {
    return $this->UserManager->getAll();
  }

  public function create(){
    return $this->UserManager->create($this->Input->all());
  }

  public function update(){
    return $this->UserManager->update($this->Input->all());
  }

  public function updateByToken(){
    return $this->UserManager->updateByToken($this->Input->all());
  }

  public function delete(){
    return $this->UserManager->delete($this->Input->all());
  }
}
