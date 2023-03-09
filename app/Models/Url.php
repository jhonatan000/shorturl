<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;
    protected $table = "url";
    protected $primaryKey = "id";
    protected $fillable = ['code','link', 'user_id'];


    public function User(){
        return $this->belongsTo(User::class,'user_id','id');
    }


}
