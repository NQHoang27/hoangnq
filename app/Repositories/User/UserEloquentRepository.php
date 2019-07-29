<?php
namespace App\Repositories\User;

use App\Repositories\EloquentRepository;

class UserEloquentRepository extends EloquentRepository implements UserRepositoryInterface
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
}