<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Grades
 * @package App\Models
 * @version October 28, 2021, 12:43 pm UTC
 *
 * @property string $grade_name
 * @property string $grade_point
 * @property string $start_marks
 * @property string $end_marks
 * @property string $start_point
 * @property string $end_point
 * @property string $remarks
 */
class Grades extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'grades';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'grade_name',
        'grade_point',
        'start_marks',
        'end_marks',
        'start_point',
        'end_point',
        'remarks'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'grade_name' => 'string',
        'grade_point' => 'string',
        'start_marks' => 'string',
        'end_marks' => 'string',
        'start_point' => 'string',
        'end_point' => 'string',
        'remarks' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'grade_name' => 'required|string|max:255',
        'grade_point' => 'required|string|max:255',
        'start_marks' => 'required|string|max:255',
        'end_marks' => 'required|string|max:255',
        'start_point' => 'required|string|max:255',
        'end_point' => 'required|string|max:255',
        'remarks' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    
}
