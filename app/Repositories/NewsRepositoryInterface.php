<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface NewsRepositoryInterface
{
    /**
     * @param $id
     * @return Model|null
     */
    public function find($id): ?Model;

}
