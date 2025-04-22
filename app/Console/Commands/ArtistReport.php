<?php

namespace App\Console\Commands;

use App\Mail\ArtistListMail;
use App\Models\Artist;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class ArtistReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'report:artist-report {--email=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Report of all of my artists';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sendToEmail = $this->option('email');
        if(!$sendToEmail) {
            return Command::FAILURE;
        };

        $artists = Artist::get();

        Mail::to($sendToEmail)->send(new ArtistListMail($artists));

        dd($artists);

        return Command::SUCCESS;
    }
}
