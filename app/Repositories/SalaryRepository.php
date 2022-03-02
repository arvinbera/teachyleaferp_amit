<?php

namespace App\Repositories;

use App\Models\Salary;
use App\Repositories\BaseRepository;

/**
 * Class SalaryRepository
 * @package App\Repositories
 * @version November 7, 2021, 1:15 pm UTC
*/

class SalaryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'employee_id',
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
        return Salary::class;
    }
}
