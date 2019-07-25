<?php
namespace App\Repositories\Contracts;

use App\Repositories\IBaseRepository;

interface IUserRepository extends IBaseRepository 
{
    /**
     * Get 5 posts hot in a month the last
     * @return mixed
     */
    public function getUser();
    public function createOrUpdate($id = null);
    // public function search();
}