<?php

namespace App\Repositories;

use App\Models\Grades;
use App\Repositories\BaseRepository;

/**
 * Class GradesRepository
 * @package App\Repositories
 * @version October 28, 2021, 12:43 pm UTC
*/

class GradesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'grade_name',
        'grade_point',
        'start_marks',
        'end_marks',
        'start_point',
        'end_point',
        'remarks'
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
        return Grades::class;
    }
}
