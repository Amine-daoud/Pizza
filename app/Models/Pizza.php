<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;

    public $timestamps = false;
     protected $fillable =
         ['nom','description','prix'];
    private mixed $created_at;
    private mixed $updated_at;
    /**
     * @var mixed|null
     */
    private mixed $deleted_at;


    function user(){
        return $this->belongsTo(User::class,'id');
    }
}
