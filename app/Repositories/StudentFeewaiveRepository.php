<?php

namespace App\Repositories;

use App\Models\StudentFeewaive;
use App\Repositories\BaseRepository;

/**
 * Class StudentFeewaiveRepository
 * @package App\Repositories
 * @version October 26, 2021, 1:08 am UTC
*/

class StudentFeewaiveRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'student_assigning_id',
        'fees_category_id',
        'discount'
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
        return StudentFeewaive::class;
    }
}
