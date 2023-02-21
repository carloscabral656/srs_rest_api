<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListCard extends Model
{
    use HasFactory;
    protected $table = 'list_card';
    protected $fillable = ['name', 'id_user'];
}
