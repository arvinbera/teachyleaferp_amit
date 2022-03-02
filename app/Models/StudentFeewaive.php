<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class StudentFeewaive
 * @package App\Models
 * @version October 26, 2021, 1:08 am UTC
 *
 * @property integer $student_assigning_id
 * @property integer $fees_category_id
 * @property number $discount
 */
class StudentFeewaive extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'student_feewaive';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'student_assigning_id',
        'fees_category_id',
        'discount'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'student_assigning_id' => 'integer',
        'fees_category_id' => 'integer',
        'discount' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'student_assigning_id' => 'required|integer',
        'fees_category_id' => 'nullable|integer',
        'discount' => 'nullable|numeric',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
