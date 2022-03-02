<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class FeesAmounts
 * @package App\Models
 * @version October 23, 2021, 5:16 pm UTC
 *
 * @property integer $fees_category_id
 * @property integer $class_id
 * @property number $amount
 */
class FeesAmounts extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'fees_amounts';

    protected $primaryKey = 'fees_category_id';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'fees_category_id',
        'class_id',
        'amount'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'fees_category_id' => 'integer',
        'class_id' => 'integer',
        'amount' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'fees_category_id' => 'required|integer',
        // 'class_id' => 'required|integer',
        // 'amount' => 'required|numeric',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function fees_category()
    {
        return $this->belongsTo(FeesCategories::class, 'fees_category_id', 'id');
    }

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id', 'id');
    }
}
