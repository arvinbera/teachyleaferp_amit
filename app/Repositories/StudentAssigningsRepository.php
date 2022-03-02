<?php

namespace App\Repositories;

use App\Models\StudentAssignings;
use App\Repositories\BaseRepository;

/**
 * Class StudentAssigningsRepository
 * @package App\Repositories
 * @version October 26, 2021, 1:08 am UTC
*/

class StudentAssigningsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'student_id',
        'session_id',
        'shift_id',
        'class_id',
        'section_id'
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
        return StudentAssignings::class;
    }
}
