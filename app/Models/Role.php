<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable=['name'];
    public function permissions()
    {
        return $this->belongsToMany('\App\Models\Permission','per_role','role_id','permission_id');
    }
}
