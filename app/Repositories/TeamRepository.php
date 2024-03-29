<?php 

namespace App\Repositories;

use App\Model\Team;
use App\Repositories\Contracts\ITeamRepository;
use App\Http\Request\TeamRequest;
class TeamRepository extends AbstractRepository implements ITeamRepository
{
	/**
	 * [$model Team]
	 * @var string
	 */
	protected $model = Team::class;

	/**
	 * [getModel]
	 * @return mixed
	 */
	public function getModel() {
		return $this->model;
	}

}