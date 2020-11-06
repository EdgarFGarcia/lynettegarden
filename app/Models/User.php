<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'positions_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    public static function fetchuserswithpositions(){
        return DB::connection('mysql')
        ->table('users as a')
        ->select(
            'a.id as id',
            DB::raw("CONCAT(a.first_name, ', ', a.last_name) as name"),
            'b.name as position',
            'a.created_at as created_at',
            'a.email as email'
        )
        ->join('user_positions as b', 'a.positions_id', '=', 'b.id')
        ->whereNull('a.deleted_at')
        ->get();
    }
}
