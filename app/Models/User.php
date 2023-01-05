<?php

namespace App\Models;
use App\Role;
use App\HasRoles;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    public $timestamps = false;
    protected $panier = [];
    protected $appends = array('availability');
    protected $hidden = ['mdp'];

    protected $fillable = ['login', 'mdp', 'type'];

    protected $attributes = [ 'type' => 'user'];

    public function getAuthPassword(){

    return $this->mdp;
     }
    public function isAdmin(){
        return $this->type == 'admin';
    }
    public function isUser(){
        return $this->type == 'user';
    }
    public function isCook(){
        return $this->type == 'user';

    }
    function pizza(){
        return $this->hasMany(Pizza::class,'id');
    }

}
