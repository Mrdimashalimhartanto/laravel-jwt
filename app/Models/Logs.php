<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    use HasFactory;

    // REPRESENTASI DATA DARI TABLE MASING MASING SESUAI DARI DATABASE 
    protected $table = 'logs';

}
