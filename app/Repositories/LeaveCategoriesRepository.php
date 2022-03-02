<?php

namespace App\Repositories;

use App\Models\LeaveCategories;
use App\Repositories\BaseRepository;

/**
 * Class LeaveCategoriesRepository
 * @package App\Repositories
 * @version November 6, 2021, 11:16 am UTC
*/

class LeaveCategoriesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return LeaveCategories::class;
    }
}
