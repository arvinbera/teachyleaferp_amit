<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Salary
 * @package App\Models
 * @version November 7, 2021, 1:15 pm UTC
 *
 * @property integer $employee_id
 * @property string $date
 * @property number $amount
 */
class Salary extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'salary';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'employee_id',
        'date',
        'amount'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'employee_id' => 'integer',
        'date' => 'string',
        'amount' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'employee_id' => 'required|integer',
        'date' => 'nullable|string|max:255',
        'amount' => 'nullable|numeric',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function employee()
    {
        return $this->belongsTo(Users::class, 'employee_id', 'id');
    }
}
