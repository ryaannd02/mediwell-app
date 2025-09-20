<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DokterProfile extends Model
{
    public function user() {
    return $this->belongsTo(User::class);
}
}
