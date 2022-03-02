<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class EmployeeRegistrations
 * @package App\Models
 * @version October 30, 2021, 5:00 am UTC
 *
 * @property string $name
 * @property string $email
 * @property string|\Carbon\Carbon $email_verified_at
 * @property string $password
 * @property string $user_type
 * @property string $role
 * @property string $profile_photo
 * @property string $phone
 * @property string $father_name
 * @property string $father_phone
 * @property string $mother_name
 * @property string $address_current
 * @property string $address_permanent
 * @property string $gender
 * @property string $religion
 * @property string $dob
 * @property string $id_no
 * @property string $joining_date
 * @property string $generated_password
 * @property integer $designation_id
 * @property number $salary
 * @property boolean $status
 * @property string $remember_token
 */
class EmployeeRegistrations extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'users';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'email_verified_at' => 'datetime',
        'password' => 'string',
        'user_type' => 'string',
        'role' => 'string',
        'profile_photo' => 'string',
        'phone' => 'string',
        'father_name' => 'string',
        'father_phone' => 'string',
        'mother_name' => 'string',
        'address_current' => 'string',
        'address_permanent' => 'string',
        'gender' => 'string',
        'religion' => 'string',
        'dob' => 'date',
        'id_no' => 'string',
        'joining_date' => 'date',
        'generated_password' => 'string',
        'designation_id' => 'integer',
        'salary' => 'float',
        'status' => 'boolean',
        'remember_token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'email' => 'nullable|string|max:255',
        'email_verified_at' => 'nullable',
        'password' => 'nullable|string|max:255',
        'user_type' => 'nullable|string|max:255',
        'role' => 'nullable|string|max:255',
        'profile_photo' => 'nullable|string|max:255',
        'phone' => 'nullable|string|max:255',
        'father_name' => 'nullable|string|max:255',
        'father_phone' => 'nullable|string|max:255',
        'mother_name' => 'nullable|string|max:255',
        'address_current' => 'nullable|string',
        'address_permanent' => 'nullable|string',
        'gender' => 'nullable|string|max:255',
        'religion' => 'nullable|string|max:255',
        'dob' => 'nullable',
        'id_no' => 'nullable|string|max:255',
        'joining_date' => 'nullable',
        'generated_password' => 'nullable|string|max:255',
        'designation_id' => 'nullable|integer',
        'salary' => 'nullable|numeric',
        // 'status' => 'required|boolean',
        'remember_token' => 'nullable|string|max:100',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];
}
