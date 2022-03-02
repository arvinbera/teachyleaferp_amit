<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class SubjectAssignings
 * @package App\Models
 * @version October 25, 2021, 2:36 am UTC
 *
 * @property integer $class_id
 * @property integer $subject_id
 * @property number $full_marks
 * @property number $pass_marks
 * @property string $subject_type
 */
class SubjectAssignings extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'subject_assignings';

    protected $primaryKey = 'class_id';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'class_id',
        'subject_id',
        'full_marks',
        'pass_marks',
        'subject_type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'class_id' => 'integer',
        'subject_id' => 'integer',
        // 'full_marks' => 'float',
        // 'pass_marks' => 'float',
        // 'subject_type' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'class_id' => 'required|integer',
        // 'subject_id' => 'required|integer',
        // 'full_marks' => 'required|numeric',
        // 'pass_marks' => 'required|numeric',
        // 'subject_type' => 'required|numeric',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id', 'id');
    }

    public function subject()
    {
        return $this->belongsTo(Subjects::class, 'subject_id', 'id');
    }
}
