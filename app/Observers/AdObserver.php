<?php

namespace App\Observers;

use App\Models\Ad;

class AdObserver
{
    /**
     * Handle the Ad "updated" event.
     */
    public function updated(Ad $ad): void
    {
        if ($ad->isDirty('budget') && $ad->budget > 0 && $ad->status == 'pending') {
            $ad->status = 'active';
            $ad->save();
        }
    }
}
