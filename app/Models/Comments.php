<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $table="comments";
    protected $fillable=["post_id","user_id","content"];
    public function getPost(){
        return $this->belongsTo(Post::class,'post_id','id');
    }
    public function getUserName(){
        return $this -> belongsTo(Post::class,'user_id','id');
    }

}
