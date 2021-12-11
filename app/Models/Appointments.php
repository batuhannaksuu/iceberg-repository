<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointments extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function contact()
    {
        return $this->belongsTo(Contacts::class);
    }
}
