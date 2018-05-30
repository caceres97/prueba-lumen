<?php

namespace App\Repositories\User;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\DatabaseManager;

use App\Repositories\User\UserInterface;

class EloquentUser implements UserInterface
{

  /**
  * @var User
  */
  protected $User;

  public function __construct(Model $User)
  {
    $this->User = $User;
  }

  public function login(array $data)
  {
    return $this->User->where('nickname', '=', $data['nickname'])->get();
  }

  public function getByToken(array $data)
  {
    return $this->User->where('remember_token', '=', $data['remember_token'])->get();
  }

  public function getAll()
  {
    return $this->User->all();
  }

  public function ById($id)
  {
    return $this->User->find($id);
  }

  public function create(array $data)
  {
    // return var_dump($data);
    return $this->User->create($data);
  }

  public function update(array $data)
  {
    $row = $this->User->findOrFail($data['id']);
    $row->update($data);
    return $row;
  }

  public function updateByToken(array $data)
  {
    // $row = $this->User->findOrFail($data['remember_token']);
    $row = $this->User->where('remember_token', $data['remember_token'])->update($data);
    return $row;
  }

  public function delete(array $data)
  {
    $User = $this->byId($data['id']);
    $User->delete();
    // $this->Account->destroy($data);

    return 'User deleted';
  }
}
