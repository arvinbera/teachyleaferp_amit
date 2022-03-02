<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class OtherExpenses
 * @package App\Models
 * @version November 7, 2021, 4:35 pm UTC
 *
 * @property string $date
 * @property number $amount
 * @property string $description
 * @property string $image
 */
class OtherExpenses extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'other_expenses';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'date',
        'amount',
        'description',
        'image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'date' => 'date',
        'amount' => 'float',
        'description' => 'string',
        // 'image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'date' => 'nullable',
        'amount' => 'nullable|numeric',
        'description' => 'nullable|string',
        // 'image' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];
}
