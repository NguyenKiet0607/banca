<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    use HasFactory;
    protected $fillable=[
        "code",
        "credit",
        "created_by",
        "use_by",
        "updated_at",
        "status",
    ];

    public function createdBy()
    {
        return $this->belongsTo(Admin::class, 'created_by', 'id');
    }

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

        if (isset($condition['buy'])){
            if (!empty($condition['code'])){
                $query->where('code', '=', $condition['code']);
                $query->where('created_at', '>=', Carbon::now()->subHours(1)->format('Y-m-d H:i:s'));
            }
        }elseif (!empty($condition['code'])) {
            $query->where('code', 'LIKE', "%" . $condition['code'] . "%");
        }

        // Thêm phần sắp xếp theo id giảm dần
        $query->orderBy('id', 'desc');

        if($returnQuery) {
            return $query;
        }
        return $query->all();
    }
}
