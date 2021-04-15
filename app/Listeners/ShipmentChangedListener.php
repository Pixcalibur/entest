<?php


namespace App\Listeners;

use App\Events\ShipmentChangedEvent;
use App\Models\VaccineShipment;
use Illuminate\Support\Facades\Redis;

class ShipmentChangedListener
{
    public function handle(ShipmentChangedEvent $event)
    {
        $total = 0;
        $vaccineShipments = VaccineShipment::all('amount');

        Redis::set('vaccine_total', $vaccineShipments->sum('amount'));
    }
}
