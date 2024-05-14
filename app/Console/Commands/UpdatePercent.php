<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Game;

class UpdatePercent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-percent';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update win percent';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //Lấy ra các game đã update được 30 giây
        $games = Game::where('parent_id', '>', 0)
                    ->whereRaw('TIMESTAMPDIFF(SECOND, updated_at, NOW()) > 30')->get();

        //Update tỉ lệ thắng
        foreach($games as $game){
            $game->percent = rand(20, 99);
            $game->save();
        }
        
        echo 'successful';
    }
}
