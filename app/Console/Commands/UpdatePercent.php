<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Game;
use Carbon\Carbon;
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
        //Lấy ra các game đã update được 60 giây
        $games = Game::where('parent_id', '>', 0)
            ->where(function($query) {
                $query->where('updated_at', '<=', Carbon::now()->subSeconds(60))
                    ->orWhere('percent', 0)
                    ->orWhereNull('percent');
            })
            ->get();

        //Update tỉ lệ thắng
        foreach($games as $game){
            $game->percent = $this->generatePercent($game->percent);
            $round = $this->updateRound($game);
            $game->fill($round);
            $game->save();
        }

      //  echo $game->percent;
    }

    public function generatePercent2($rate){
        if ($rate === null || $rate >= 105 ||$rate === 0) {
            $rate = mt_rand(30, 100);
        }
        return $rate +1;
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

    /**
     * Update round when round_end is null or round_end < current time
     */
    public function updateRound($game) {
        $currentTime = now();

        if (is_null($game->round_start) || Carbon::parse($game->round_start)->lessThan($currentTime)) {
            $roundStart = Carbon::parse($currentTime)->addMinutes(rand(5, 10));
            $roundEnd = Carbon::parse($roundStart)->addMinutes(rand(8, 15));
            echo $roundStart;
            return [
                'round_start' => $roundStart,
                'round_end' => $roundEnd,
                'round_count' => rand(30, 150)
            ];
        }
        //case qua ngay moi
        if(Carbon::parse($game->round_end)->lessThan(Carbon::parse($game->round_start))){
            $roundStart = Carbon::parse($game->round_end);
            $roundEnd = Carbon::parse($roundStart)->addMinutes(rand(8, 15));
            echo $roundStart;
            return [
                'round_start' => $roundStart,
                'round_end' => $roundEnd,
                'round_count' => rand(30, 150)
            ];
        }

        return [];
    }
}
