<?php

namespace App\Repositories;

use App\Models\Subjects;
use App\Repositories\BaseRepository;

/**
 * Class SubjectsRepository
 * @package App\Repositories
 * @version October 25, 2021, 2:02 am UTC
*/

class SubjectsRepository extends BaseRepository
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
        return Subjects::class;
    }
}
