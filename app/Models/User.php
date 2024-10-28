<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'name',
        'role',
        'password',
        'status',
        'coin',
        'total_credit',
        'staff_id',
        'tenant_code',
        'phone',
        'phone_zalo',
        'ip',
        'expired_time'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
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
            $query->where('username', '=', $condition['name'])
                ->orWhere('name', '=', $condition['name']);
        }

        //admin chi tim duoc theo ten, khong list duoc
        if (Auth::guard('admin')->user()->role == 2 && empty($condition['name'])){
            $query->where('username', '=', '');
        }

        if($returnQuery) {
            return $query;
        }
        return $query->all();
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
