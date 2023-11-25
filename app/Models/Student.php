<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $fillable = [
        'name',
        'class_id',
        'roll',
        'email',
    ];

    //Relationship with classs table
    public function classs():BelongsTo
    {
        return $this->belongsTo(Classs::class,'class_id','id');
    }
}
