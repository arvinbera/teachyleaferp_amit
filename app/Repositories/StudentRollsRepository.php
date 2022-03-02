<?php

namespace App\Repositories;

use App\Models\StudentRolls;
use App\Repositories\BaseRepository;

/**
 * Class StudentRollsRepository
 * @package App\Repositories
 * @version October 27, 2021, 12:09 pm UTC
*/

class StudentRollsRepository extends BaseRepository
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
        'profile_photo',
        'phone',
        'father_name',
        'father_phone',
        'mother_name',
        'address_current',
        'address_permanent',
        'gender',
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
        return StudentRolls::class;
    }
}
