<?php
namespace App\Repositories\User;

use App\Repositories\EloquentRepository;
use App\Http\Request\UserRequest;
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
     * 
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
            $user->save();
        }
        else{
            //update after validation
            $user = User::find($id);
            $user->update([       
                'name' => $request->get('name'), 
                'email' => $request->get('email'),
                'password' => Hash::make($request->password),
                'id_teams' => $request->get('id_teams'),
            ]);
        }
    }
}