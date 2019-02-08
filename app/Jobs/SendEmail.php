<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use \App\Classes\Notify;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    protected $notification;
    protected $user;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Notify $notification,$user)
    {
        $this->notification = $notification;
        $this->user = $user;
    }
    protected $tries = 10;
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      $this->user->notify($this->notification);
    }
}
