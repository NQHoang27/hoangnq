<?php
namespace App\Repositories\Contracts;

use App\Repositories\IBaseRepository;
use App\Http\Request\ProjectRequest;

interface IProjectRepository extends IBaseRepository 
{
    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    // public function createOrUpdate($id = null);
}