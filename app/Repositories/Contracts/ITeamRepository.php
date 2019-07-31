<?php
namespace App\Repositories\Contracts;

use App\Repositories\IBaseRepository;
use App\Http\Request\TeamRequest;

interface ITeamRepository extends IBaseRepository 
{
    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    