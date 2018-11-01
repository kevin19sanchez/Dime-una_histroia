<?php

namespace App\Repositories;

use App\Models\section;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class sectionRepository
 * @package App\Repositories
 * @version October 14, 2018, 3:43 am UTC
 *
 * @method section findWithoutFail($id, $columns = ['*'])
 * @method section find($id, $columns = ['*'])
 * @method section first($columns = ['*'])
*/
class sectionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_story',
        'name',
        'description',
        'url'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return section::class;
    }
}
