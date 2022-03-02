<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class SalaryLogs
 * @package App\Models
 * @version October 30, 2021, 5:01 am UTC
 *
 * @property integer $employee_id
 * @property number $previous_salary
 * @property number $present_salary
 * @property number $increment
 * @property string $effective_from
 */
class SalaryLogs extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'salary_logs';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'employee_id',
        'previous_salary',
        'present_salary',
        'increment',
        'effective_from'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'employee_id' => 'integer',
        'previous_salary' => 'float',
        'present_salary' => 'float',
        'increment' => 'float',
        'effective_from' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'employee_id' => 'required|integer',
        'previous_salary' => 'nullable|numeric',
        'present_salary' => 'nullable|numeric',
        'increment' => 'nullable|numeric',
        'effective_from' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    
}
