<?php

namespace App\Repositories;

use App\Models\SalaryLogs;
use App\Repositories\BaseRepository;

/**
 * Class SalaryLogsRepository
 * @package App\Repositories
 * @version October 30, 2021, 5:01 am UTC
*/

class SalaryLogsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'employee_id',
        'previous_salary',
        'present_salary',
        'increment',
        'effective_from'
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
        return SalaryLogs::class;
    }
}
