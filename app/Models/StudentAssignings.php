<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class StudentAssignings
 * @package App\Models
 * @version October 26, 2021, 1:08 am UTC
 *
 * @property string $student_id
 * @property string $session_id
 * @property string $shift_id
 * @property string $class_id
 * @property string $section_id
 */
class StudentAssignings extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'student_assignings';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'student_id',
        'session_id',
        'shift_id',
        'class_id',
        'section_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'student_id' => 'string',
        'session_id' => 'string',
        'shift_id' => 'string',
        'class_id' => 'string',
        'section_id' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'student_id' => 'required|string|max:255',
        'session_id' => 'required|string|max:255',
        'shift_id' => 'nullable|string|max:255',
        'class_id' => 'required|string|max:255',
        'section_id' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function student()
    {
        return $this->belongsTo(Users::class, 'student_id', 'id');
    }

    public function session()
    {
        return $this->belongsTo(Sessions::class, 'session_id', 'id');
    }

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id', 'id');
    }

    public function section()
    {
        return $this->belongsTo(Sections::class, 'section_id', 'id');
    }

    public function feewaive()
    {
        return $this->belongsTo(StudentFeewaive::class, 'id', 'student_assigning_id');
    }
}
