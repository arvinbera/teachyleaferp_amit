<?php

namespace App\Repositories;

use App\Models\Sessions;
use App\Repositories\BaseRepository;

/**
 * Class SessionsRepository
 * @package App\Repositories
 * @version October 23, 2021, 12:14 pm UTC
*/

class SessionsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Sessions::class;
    }
}
