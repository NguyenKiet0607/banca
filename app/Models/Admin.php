<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'username',
        'role',
        'password',
        'status',
        'coint',
        'tenant_code',
        'total_credit'
    ];

    /**
     * Get list
     *
     * @param array $condition
     * @param array $select
     * @return \Illuminate\Database\Eloquent\Builder || null
     */
    public static function getAll(array $condition = [], array $select = [], $returnQuery = false)
    {
        $query = self::query();
        $query->select($select);

        if (!empty($condition['id'])) {
            $query->where('id', $condition['id']);
        }

        if (!empty($condition['name'])) {
            $query->where('username', 'LIKE', "%" . $condition['name'] . "%")
                ->orWhere('email', 'LIKE', "%" . $condition['name'] . "%");
        }

        $query->whereIn('role', [1, 2]);

        if($returnQuery) {
            return $query;
        }
        return $query->all();
    }
}
