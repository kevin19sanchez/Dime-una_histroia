<?php

namespace App\Repositories;

use App\Models\story;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class storyRepository
 * @package App\Repositories
 * @version October 14, 2018, 3:43 am UTC
 *
 * @method story findWithoutFail($id, $columns = ['*'])
 * @method story find($id, $columns = ['*'])
 * @method story first($columns = ['*'])
*/
class storyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'state',
        'id_category'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return story::class;
    }
}
