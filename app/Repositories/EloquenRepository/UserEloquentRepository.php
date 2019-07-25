<?php
namespace App\Repositories\EloquentRepository;

use App\Repositories\EloquentRepository;
use App\Http\Request\UserRequest;
use Carbon\Carbon;
class UserEloquentRepository extends EloquentRepository implements IUserRepository
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Model\User::class;
    }

    /**
     * Get 5 User id_teams > 1
     * @return  mixed
     */
    public function getUser()
    {
    	return $this->_model::where('id_teams','>=',1,)->orderBy('id','desc')->take(5)->get();
    }

    /**
     * [createOrUpdate table User]
     * @param  [type]      $id      [description]
     * @param  UserRequest $request [description]
     * @return mixed
     */
    public function createOrUpdate($id = null, UserRequest $request)
    {
        if(is_null($id)) {
            //create after validation
            $user = new User;
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->id_teams = $request->id_teams;
            $user->created_at = Carbon::now('Asia/Ho_Chi_Minh')->toDayDateTimeString();
            $user->updated_at = Carbon::now('Asia/Ho_Chi_Minh')->toDayDateTimeString();
            $user->save();
        }
        else{
            //update after validation
            $user = User::find($id);
            $user->update([       
                'name' => $request->get('name'), 
                'email' => $request->get('email'),
                'password' => bcrypt($request->password),
                'id_teams' => $request->get('id_teams'),
                'update_at' => Carbon::now('Asia/Ho_Chi_Minh')->($request->updated_at),
            ]);
        }
    }

    // /**
    //  * [search username]
    //  * @return mixed
    //  */
    // public function search()
    // {
    //     return $this->_model->scopeSearch();
    // }
}