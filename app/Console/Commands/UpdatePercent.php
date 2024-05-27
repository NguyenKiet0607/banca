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
                    ->whereRaw('TIMESTAMPDIFF(SECOND, updated_at, NOW()) > 15')->get();

        //Update tỉ lệ thắng
        foreach($games as $game){
            $game->percent = $this->generatePercent($game->percent);
            $game->save();
        }

        echo $game->percent;
    }


    public function generatePercent($rate) {
        if ($rate === null) {
            $rate = 0;
        }
        $ranges = array(
            array(89, 91),
            array(20, 40),
            array(41, 60),
            array(60, 65),
            array(76,79),
            array(80, 83),
            array(66, 70),
            array(92, 95),
            array(71, 75),
            array(84, 88)
        );

        $numRanges = count($ranges);

        // Tìm xem rate nằm trong khoảng nào
        $inRange = false;
        for ($i = 0; $i < $numRanges; $i++) {
            if ($rate >= $ranges[$i][0] && $rate <= $ranges[$i][1]) {
                $inRange = true;
                break;
            }
        }

        // Nếu rate nằm trong khoảng, trả về một số ngẫu nhiên trong khoảng tiếp theo
        if ($inRange) {
            $nextRange = ($i + 1) % $numRanges; // Lấy chỉ số của khoảng tiếp theo (quay vòng)
            return mt_rand($ranges[$nextRange][0], $ranges[$nextRange][1]); // Trả về số ngẫu nhiên trong khoảng tiếp theo
        } else {
            // Nếu không, trả về một số ngẫu nhiên trong khoảng đầu tiên
            return mt_rand($ranges[0][0], $ranges[0][1]);
        }
    }
}
