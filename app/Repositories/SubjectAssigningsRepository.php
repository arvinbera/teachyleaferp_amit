<?php

namespace App\Repositories;

use App\Models\SubjectAssignings;
use App\Repositories\BaseRepository;

/**
 * Class SubjectAssigningsRepository
 * @package App\Repositories
 * @version October 25, 2021, 2:36 am UTC
 */

class SubjectAssigningsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'class_id',
        'subject_id',
        'full_marks',
        'pass_marks',
        'subject_type'
    ];

    protected $primaryKey = 'class_id';

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
        return SubjectAssignings::class;
    }
}
