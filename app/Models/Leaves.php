<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Leaves
 * @package App\Models
 * @version November 6, 2021, 11:16 am UTC
 *
 * @property integer $employee_id
 * @property integer $leave_category_id
 * @property string $start_date
 * @property string $end_date
 */
class Leaves extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'leaves';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'employee_id',
        'leave_category_id',
        'start_date',
        'end_date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'employee_id' => 'integer',
        'leave_category_id' => 'integer',
        'start_date' => 'date',
        'end_date' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'employee_id' => 'required|integer',
        'leave_category_id' => 'required|integer',
        'start_date' => 'required',
        'end_date' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function employee()
    {
        return $this->belongsTo(Users::class, 'employee_id', 'id');
    }
    public function leave_category()
    {
        return $this->belongsTo(LeaveCategories::class, 'leave_category_id', 'id');
    }
}
