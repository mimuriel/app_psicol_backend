<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    public $table = "teachers";
    protected $fillable = [ 'id','document','name','phone','email','address','city'];

    public function subjects() {
        return $this->hasMany(Subject::class,'id');
    }
}
