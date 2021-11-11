<?php

namespace App\Jobs;

use App\Mail\SendEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use Illuminate\Contracts\Mail\Mailer;

class SendEmailWithPassword implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    /**
     * Execute the job.
     */
    public function handle(Mailer $mailer): void
    {
        $mailer
            ->to($this->user->email)
            ->send(new SendEmail($this->user));
    }
}