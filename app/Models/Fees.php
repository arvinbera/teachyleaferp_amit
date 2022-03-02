<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Fees
 * @package App\Models
 * @version October 29, 2021, 9:30 am UTC
 *
 * @property integer $session_id
 * @property integer $class_id
 * @property integer $student_id
 * @property integer $fee_category_id
 * @property string $date
 * @property number $amount
 */
class Fees extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'fees';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'session_id',
        'class_id',
        'student_id',
        'fees_category_id',
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
        'session_id' => 'integer',
        'class_id' => 'integer',
        'student_id' => 'integer',
        'fees_category_id' => 'integer',
        'date' => 'string',
        'amount' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'session_id' => 'nullable|integer',
        'class_id' => 'nullable|integer',
        'student_id' => 'nullable|integer',
        'fees_category_id' => 'nullable|integer',
        'date' => 'nullable|string|max:255',
        'amount' => 'nullable|numeric',
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

    public function fees_category()
    {
        return $this->belongsTo(FeesCategories::class, 'fees_category_id', 'id');
    }
}
