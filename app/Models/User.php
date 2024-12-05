<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable implements AuthenticatableContract
{
    protected $primaryKey = 'id_user';
    public $incrementing = true; // Jika primary key auto-increment
    protected $keyType = 'int'; // Tipe data primary key
    protected $fillable = [
        'nama_user', 'jenis_kelamin', 'username', 'no_telepon', 'email', 'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function setPasswordAttribute($password)
    {
        if (Hash::needsRehash($password)) {
            $this->attributes['password'] = bcrypt($password);
        } else {
            $this->attributes['password'] = $password;
        }
    }
}