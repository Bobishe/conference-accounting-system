<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\children;

class events extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_ivent',
        'organaizer',
        'last_line',
        'deadlines',
        'email',
        'name_participant',
        'name_meneger',
        'form',
        'specialization',
        'cost',
        'date_of_delivery',
        'result_name',
        'file'];

    public function children(){
        return $this->hasMany(children::class, 'event_id', 'id');
    }

}


