<?php

namespace App\Repositories;

use App\Models\StudentRegistrations;
use App\Repositories\BaseRepository;

/**
 * Class StudentRegistrationsRepository
 * @package App\Repositories
 * @version October 26, 2021, 1:07 am UTC
*/

class StudentRegistrationsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'user_type',
        'role',
        'phone',
        'father_name',
        'father_phone',
        'mother_name',
        'address_current',
        'address_permanent',
        'religion',
        'dob',
        'id_no',
        'joining_date',
        'generated_password',
        'designation_id',
        'salary',
        'status',
        'remember_token'
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
        return StudentRegistrations::class;
    }
}
