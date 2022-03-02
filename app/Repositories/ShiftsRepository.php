<?php

namespace App\Repositories;

use App\Models\Shifts;
use App\Repositories\BaseRepository;

/**
 * Class ShiftsRepository
 * @package App\Repositories
 * @version October 23, 2021, 3:56 pm UTC
*/

class ShiftsRepository extends BaseRepository
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
        return Shifts::class;
    }
}
