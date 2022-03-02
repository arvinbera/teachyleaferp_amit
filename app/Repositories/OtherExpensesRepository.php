<?php

namespace App\Repositories;

use App\Models\OtherExpenses;
use App\Repositories\BaseRepository;

/**
 * Class OtherExpensesRepository
 * @package App\Repositories
 * @version November 7, 2021, 4:35 pm UTC
*/

class OtherExpensesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'date',
        'amount',
        'description',
        'image'
    ];

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
        return OtherExpenses::class;
    }
}
