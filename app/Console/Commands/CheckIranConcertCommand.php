<?php

namespace App\Console\Commands;

use App\Mail\RashtConcertsEmail;
use App\Services\RequestService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class CheckIranConcertCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-iran-concert-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $request = new RequestService();
        $body = $request->send(config('concert.url'));
        $concerts = $request->processBody($body);

        $this->sendEmail($concerts);
        return $concerts;
    }

    public function sendEmail($concerts)
    {
        $recipient = env('MAIL_TO_ADDRESS');

        Mail::to($recipient)->send(new RashtConcertsEmail($concerts));
    }
}
