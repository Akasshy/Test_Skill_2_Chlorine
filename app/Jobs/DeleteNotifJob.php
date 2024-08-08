<?php

namespace App\Jobs;

use App\Mail\DeleteNotif;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class DeleteNotifJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a pyunew job instance.
     */
    
    public function __construct()
    {

    }

    public function handle(): void
    {
        Mail::to('akasshy@gmail.com')->send(new DeleteNotif());
    }
}
