<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;

class usuarios extends Authenticable
{
    //
    protected $table = 'usuarios';

    protected $fillable = [
        'user_name',
        'user_pass',
        'user_tipo'
    ];

    protected $hidden = ['user_pass'];

    public function getAuthPassword(){
        return $this->user_pass;
    }

    public $timestamps = false;
}
