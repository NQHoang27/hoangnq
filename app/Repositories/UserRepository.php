<?php 
namespace App\Repositories;

use App\User;
use App\Repositories\Contracts\IUserRepository;

/**
* ProvidedDeviceRepository class
* Author: jvb
* Date: 2019/06/17 14:30
*/
class UserRepository extends AbstractRepository implements IUserRepository
{
/**
* ProvidedDeviceModel
*
* @var  string
*/
	protected $model = User::class;

	public function getModel() {
		return $this->model;
	}

	public function getUser($id = null) {

	}

	public function createOrUpdate($id = null) {
		
	}

}
