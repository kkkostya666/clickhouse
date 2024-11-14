<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'text',
        'status',
        'url',
        'impressions_count',
        'cpm',
        'budget',
        'button_text',
        'campaign_id'
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    public function refreshStatusInThreeMinutes()
    {
        $this->status = 'pending';
        $this->save();
        DB::table('ads')->where('id', $this->id)->update(['status' => 'pending']);

        dispatch(function () {
            $this->status = 'active';
            $this->save();
        })->delay(Carbon::now()->addMinutes(3));
    }
}
