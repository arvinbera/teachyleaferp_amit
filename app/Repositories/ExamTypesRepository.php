<?php

namespace App\Repositories;

use App\Models\ExamTypes;
use App\Repositories\BaseRepository;

/**
 * Class ExamTypesRepository
 * @package App\Repositories
 * @version October 24, 2021, 2:54 pm UTC
*/

class ExamTypesRepository extends BaseRepository
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
        return ExamTypes::class;
    }
}
