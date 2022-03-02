<?php

namespace App\Repositories;

use App\Models\EmployeeAttendances;
use App\Repositories\BaseRepository;

/**
 * Class EmployeeAttendancesRepository
 * @package App\Repositories
 * @version November 7, 2021, 2:04 am UTC
*/

class EmployeeAttendancesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'employee_id',
        'date',
        'attendance_status'
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
        return EmployeeAttendances::class;
    }
}
