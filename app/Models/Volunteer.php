<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Volunteer extends Model
{
    use HasFactory;

    protected $fillable = [
        'vaccine_type_id',
        'email',
        'name',
        'preferred_date'
    ];

    public function vaccine() : HasOne
    {
        return $this->hasOne(VaccineType::class, 'id', 'vaccine_type_id')->withTrashed();
    }
}
