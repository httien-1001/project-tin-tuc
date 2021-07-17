<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comments extends Model
{
    use HasFactory,SoftDeletes;
    protected $table="comments";
    protected $fillable=["post_id","user_id","content","deleted_at"];
    public function post(){
        return $this->belongsTo(Post::class,'post_id','id');
    }
    public function commenter(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
