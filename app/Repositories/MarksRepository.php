<?php

namespace App\Repositories;

use App\Models\Marks;
use App\Repositories\BaseRepository;

/**
 * Class MarksRepository
 * @package App\Repositories
 * @version October 28, 2021, 2:45 am UTC
*/

class MarksRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'student_id',
        'id_no',
        'session_id',
        'class_id',
        'exam_type_id',
        'subject_assigning_id',
        'marks'
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
        return Marks::class;
    }
}
