<?php
namespace App\Repositories\EloquentRepository;

use App\Repositories\EloquentRepository;
use App\Http\Request\ProjectRequest;
use Carbon\Carbon;
class ProjectEloquentRepository extends EloquentRepository implements IProjectRepository
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return \App\Model\Project::class;
    }
}