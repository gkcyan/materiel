<?php

namespace App\Repositories;

use App\Models\PermissionUser;
use App\Repositories\BaseRepository;

/**
 * Class PermissionUserRepository
 * @package App\Repositories
 * @version May 16, 2020, 11:33 pm UTC
*/

class PermissionUserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'permission_id',
        'user_id'
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
        return PermissionUser::class;
    }
}
