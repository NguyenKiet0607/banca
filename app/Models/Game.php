<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'image_url',
        'parent_id',
        'priority',
        'slug',
        'percent',
        'workplace',
        'round_start',
        'round_end',
        'round_count'
    ];

    public function getGame($condition=[], $returnQuery = false)
    {
        $query = self::query();

        if (!empty($condition['id'])) {
            $query->where('id', $condition['id']);
        }

        if (!empty($condition['name'])) {
            $query->where('name', 'LIKE', '%'.$condition['name'].'%');
        }

        if (!empty($condition['slug'])) {
            $query->where('slug', $condition['slug']);
        }

        if (isset($condition['parent_id']) ) {
            $query->where('parent_id', $condition['parent_id']);
        }

        if (isset($condition['workplace']) ) {
            $query->whereIn('workplace', [0, $condition['workplace']]);
        }

        if($returnQuery) {
            return $query;
        }
        return $query->get();
    }
    public function getParentGames($condition=[], $returnQuery = false)
    {
        $query = self::query();
        $query->where('parent_id','=',0);

        if($returnQuery) {
            return $query;
        }
        return $query->get();
    }
}
