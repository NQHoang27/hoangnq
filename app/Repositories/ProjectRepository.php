<?php 

namespace App\Repositories;

use App\Model\Project;
use App\Repositories\Contracts\IProjectRepository;
class ProjectRepository extends AbstractRepository implements IProjectRepository
{
	/**
	 * [$model Project]
	 * @var string
	 */
	protected $model = Project::class;

	/**
	 * [getModel]
	 * @return mixed
	 */
	public function getModel() {
		return $this->model;
	}
}