<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Marks
 * @package App\Models
 * @version October 28, 2021, 2:45 am UTC
 *
 * @property integer $student_id
 * @property integer $id_no
 * @property integer $session_id
 * @property integer $class_id
 * @property integer $exam_type_id
 * @property integer $subject_assigning_id
 * @property number $marks
 */
class Marks extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'marks';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'student_id',
        'id_no',
        'session_id',
        'class_id',
        'exam_type_id',
        'subject_assigning_id',
        'marks'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'student_id' => 'integer',
        'id_no' => 'integer',
        'session_id' => 'integer',
        'class_id' => 'integer',
        'exam_type_id' => 'integer',
        'subject_assigning_id' => 'integer',
        'marks' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'student_id' => 'required|integer',
        'id_no' => 'nullable|integer',
        'session_id' => 'nullable|integer',
        'class_id' => 'nullable|integer',
        'exam_type_id' => 'nullable|integer',
        'subject_assigning_id' => 'nullable|integer',
        'marks' => 'nullable|numeric',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
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

    public function exam_type()
    {
        return $this->belongsTo(ExamTypes::class, 'exam_type_id', 'id');
    }

    public function subject_assigning()
    {
        return $this->belongsTo(SubjectAssignings::class, 'subject_assigning_id', 'id');
    }
}
