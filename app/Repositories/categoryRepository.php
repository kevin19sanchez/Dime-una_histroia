<?php

namespace App\Repositories;

use App\Models\category;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class categoryRepository
 * @package App\Repositories
 * @version October 14, 2018, 3:43 am UTC
 *
 * @method category findWithoutFail($id, $columns = ['*'])
 * @method category find($id, $columns = ['*'])
 * @method category first($columns = ['*'])
*/
class categoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return category::class;
    }
}
