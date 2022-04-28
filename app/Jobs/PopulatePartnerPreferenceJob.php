<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use App\Jobs\PopulateEmptyPartnerPreferencesJob;

class PopulatePartnerPreferenceJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user_ids = DB::table('users')
        ->leftJoin('partner_preferences', 'partner_preferences.user_id', '=', 'users.id')
        ->select('users.id')
        ->where('partner_preferences.id', '=', Null)
        ->pluck('users.id');

        foreach ($user_ids as $user_id) {
            PopulateEmptyPartnerPreferencesJob::dispatch($user_id);
        }
    }
}
