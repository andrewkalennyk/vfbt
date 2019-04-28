<?php

namespace App\Observers;

use App\Models\GeneralInfoCitizen;
use App\Models\Pivots\CitizenPromotion;
use Illuminate\Support\Facades\Log;

class CitizenPromotionsObserver
{
    public function created(CitizenPromotion $pivot)
    {
        $generalInfo = GeneralInfoCitizen::byCitizen($pivot->citizen_id)->first();

        if ($generalInfo) {
            $generalInfo->promotions()->attach($pivot->promotion_id);
        }

    }
}
