<?php

namespace App\Repositories;

use App\Models\Leaves;
use App\Repositories\BaseRepository;

/**
 * Class LeavesRepository
 * @package App\Repositories
 * @version November 6, 2021, 11:16 am UTC
*/

class LeavesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'employee_id',
        'leave_category_id',
        'start_date',
        'end_date'
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
        return Leaves::class;
    }
}
