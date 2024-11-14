<?php

namespace App\Observers;

use App\Models\Ad;
use App\Models\Campaign;

class CampaignObserver
{
    public function updated(Campaign $campaign): void
    {
        if ($campaign->isDirty('status') && in_array($campaign->status, ['pending', 'archived'])) {
            Ad::where('campaign_id', $campaign->id)->update(['status' => $campaign->status]);
        }
    }
}
