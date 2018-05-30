<?php

namespace App\Services\UserManagement;

use App\Repositories\User\UserInterface;

use Illuminate\Database\DatabaseManager;

use Illuminate\Support\Facades\Crypt;

class UserManager implements UserManagementInterface
{
  protected $UserRepository;

  protected $Crypt;

  public function __construct(UserInterface $UserRepository)
  {
    $this->UserRepository = $UserRepository;

    // $this->Crypt = $Crypt;
  }

  public function login($input)
  {
    $User = $this->UserRepository->login($input);

    if(!$User)
    {
      return array("error" => "The user doesn't exist");
    }

    foreach ($User as $key => $value) {

      $pass = Crypt::decryptString($value['password']);

      if($pass == $input['password'])
      {
        return array('error' => null, 'token' => $value['remember_token'], 'id' => $value['id']);
      }
    }

    return array("error" => "Incorrect Password");
  }

  public function getAll()
  {
    return $this->UserRepository->getAll();
  }

  public function getById($id)
  {
    return $this->UserRepository->byId($id);
  }

  public function create($input)
  {
    unset($input['id']);

    $input['password'] = Crypt::encryptString($input['password']);
    $input['remember_token'] = str_random(60);

    return $this->UserRepository->create($input);
  }

  public function update($input)
  {
    foreach ($input as $key => $value) {
      if($input[$key] == '')
      {
        unset($input[$key]);
      }
    }

    return $this->UserRepository->update($input);
  }

  public function updateByToken($input)
  {
    if(isset($input['older']) && isset($input['newer']))
    {
      $User = $this->UserRepository->getByToken($input);

      foreach ($User as $key => $value) {

        $pass = Crypt::decryptString($value['password']);

        if($pass == $input['older'])
        {
          //Actualiza el pass
          $input['password'] = Crypt::encryptString($input['newer']);
          unset($input['newer'], $input['older']);
          $this->UserRepository->updateByToken($input);

        }
        else {
          return array('error' => "The passwords doen't match");
        }
      }
    }
    return array('msg' => 'The password was update!');
  }

  public function delete($input)
  {
    return $this->UserRepository->delete($input);
  }
}
