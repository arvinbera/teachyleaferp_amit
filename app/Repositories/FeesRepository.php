<?php

namespace App\Repositories;

use App\Models\Fees;
use App\Repositories\BaseRepository;

/**
 * Class FeesRepository
 * @package App\Repositories
 * @version October 29, 2021, 9:30 am UTC
 */

class FeesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'session_id',
        'class_id',
        'student_id',
        'fees_category_id',
        'date',
        'amount'
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
        return Fees::class;
    }
}
