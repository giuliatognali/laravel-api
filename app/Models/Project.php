<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable =['name', 'content'];
    //protected $guarded = ['slug', 'image'];
     //il mass update prenderà in considerazione tutto tranne lo slug e image

     public function type(){
        return $this->belongsTo(Type::class); 
    }

    public function technologies(){
        return $this->belongsToMany(Technology::class)->withTimestamps();
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn(string|null $value) => $value !== null ?  asset('storage/' .$value) : null,
        );
    }
}
