<?php

namespace App\Repositories;

use App\Models\FeesAmounts;
use App\Repositories\BaseRepository;

/**
 * Class FeesAmountsRepository
 * @package App\Repositories
 * @version October 23, 2021, 5:16 pm UTC
 */

class FeesAmountsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fees_category_id',
        'class_id',
        'amount'
    ];

    protected $primaryKey = 'fees_category_id';

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return FeesAmounts::class;
    }
}
