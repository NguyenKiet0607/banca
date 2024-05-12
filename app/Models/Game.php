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
        'slug'
    ];

    public function getGame($condition=[], $returnQuery = false)
    {
        $query = self::query();

        if (!empty($condition['id'])) {
            $query->where('id', $condition['id']);
        }

        if (!empty($condition['slug'])) {
            $query->where('slug', $condition['slug']);
        }

        if (!empty($condition['parent_id'])) {
            $query->where('parent_id', $condition['parent_id']);
        }

        if($returnQuery) {
            return $query;
        }
        return $query->get();
    }
}
