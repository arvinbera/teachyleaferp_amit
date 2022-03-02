<?php

namespace App\Repositories;

use App\Models\Users;
use App\Repositories\BaseRepository;

/**
 * Class UsersRepository
 * @package App\Repositories
 * @version October 25, 2021, 4:05 pm UTC
*/

class UsersRepository extends BaseRepository
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
        return Users::class;
    }
}
