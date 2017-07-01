<?php

namespace CodeProject\Repositories;

use CodeProject\Entities\Client;
//use Composer\Repository\BaseRepository;
use Prettus\Repository\Eloquent\BaseRepository;

class ClientRepositoryEloquent extends BaseRepository implements ClientRepository
{
	public function model()
	{
		return Client::class;
	}

}