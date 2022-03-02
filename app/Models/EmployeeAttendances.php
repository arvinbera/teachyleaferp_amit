<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class EmployeeAttendances
 * @package App\Models
 * @version November 7, 2021, 2:04 am UTC
 *
 * @property integer $employee_id
 * @property string $date
 * @property string $attendance_status
 */
class EmployeeAttendances extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'employee_attendances';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'employee_id',
        'date',
        'attendance_status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        // 'employee_id' => 'integer',
        'date' => 'date',
        // 'attendance_status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        // 'employee_id' => 'required|integer',
        'date' => 'required',
        // 'attendance_status' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function employee()
    {
        return $this->belongsTo(Users::class, 'employee_id', 'id');
    }
}
