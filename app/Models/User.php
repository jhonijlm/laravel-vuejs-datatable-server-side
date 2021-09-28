<?php

namespace App\Models;

use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeFiltered(Builder $builder) {
        $search = request('search');
        $sortBy = request('sortBy') ;
        $order = request('descending') == 'true' ? 'desc' : 'asc';
        $users = $builder->select(
            'users.id AS id',
            'users.name AS name',
            'users.last_name AS last_name',
            'users.cell_phone AS cell_phone',
            'users.address AS address',
            'users.email AS email',
        );

        if ($search && strlen($search) > 0) {
            $listSearch = Str::of($search)->split('/[\s,]+/')->toArray();
            $search = count($listSearch) > 0 ? implode("%", $listSearch) : $search;
            $users->whereRaw("CONCAT( IFNULL(users.name,''),' ', IFNULL(users.last_name, '') ,' ', IFNULL(users.email, '') ,' ', IFNULL(users.cell_phone, '')) LIKE '%{$search}%'");
        }

        if($sortBy != ""){
            $users->orderBy($sortBy, $order);
        }

        return $users;
    }
}
