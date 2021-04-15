<?php

namespace App\Models;

use App\Events\ShipmentChangedEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;

class VaccineShipment extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'vaccine_type_id',
        'amount',
        'arrival_date'
    ];

    public function type() : HasOne
    {
        return $this->hasOne(VaccineType::class, 'id', 'vaccine_type_id')->withTrashed();
    }

    protected $dispatchesEvents = [
        'saved' => ShipmentChangedEvent::class,
        'deleted' => ShipmentChangedEvent::class,
    ];
}
