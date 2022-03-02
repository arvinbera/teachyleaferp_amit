<?php

namespace App\Repositories;

use App\Models\FeesCategories;
use App\Repositories\BaseRepository;

/**
 * Class FeesCategoriesRepository
 * @package App\Repositories
 * @version October 23, 2021, 4:45 pm UTC
*/

class FeesCategoriesRepository extends BaseRepository
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
        return FeesCategories::class;
    }
}
