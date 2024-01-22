<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Penduduk extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guard = "penduduk";
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'picture',
        'nik',
        'alamat',
        'telepon',
        'gol_darah',
        'agama',
        'agama',
        'gender',
        'status_nikah',
        'kewarganegaraan',
        'tempat_lahir',
        
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
    public function getPictureAttribute($value){
        if( $value ){
            return asset('/images/users/penduduks'.$value);
        }else{
            return asset('/images/users/default-avatar.png');
        }
    }
}
