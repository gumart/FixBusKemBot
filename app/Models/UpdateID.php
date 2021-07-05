<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpdateID extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'updates_id';

    protected $fillable = [
        'update_id',
    ];
}
