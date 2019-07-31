<?php 
namespace App\Repositories;

use App\User;
use App\Repositories\Contracts\IUserRepository;
use App\Http\Request\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

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

    public function getUser($id = null) 
    {

    }

	/**
     * Get 5 User id_teams > 1
     * @return  mixed
     */
  public function getUsers()
  {
   return $this->_model::where('id_teams','>=',1,)->orderBy('id','desc')->take(5)->get();
 }

 // public function createOrUpdate($id, array $request)
 // {
 //        //update after validation
 //  $this->_model->update([
 //      'id' => $id, 
 //      'name' => $request['name'],
 //      'email' => $request['email'],
 //      'id_teams' => $request['id_teams'],
 //      'password' => Hash::make($request['password']),
 //      'update_at' => Carbon::now('Asia/Ho_Chi_Minh')
 //    ]);      
 //  }
}
