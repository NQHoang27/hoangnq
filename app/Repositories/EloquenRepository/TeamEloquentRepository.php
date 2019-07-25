<?php
namespace App\Repositories\EloquentRepository;

use App\Repositories\EloquentRepository;
use App\Http\Request\TeamRequest;
use Carbon\Carbon;
class TeamEloquentRepository extends EloquentRepository implements ITeamRepository
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Model\Team::class;
    }

}