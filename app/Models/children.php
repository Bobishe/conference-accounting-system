<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\events;

class children extends Model
{
    use HasFactory;

    protected $fillable= ['fio', 'number', 'email'];

    public function event(){
        return $this->hasMany(events::class, 'children_id', 'id');
    }
}
