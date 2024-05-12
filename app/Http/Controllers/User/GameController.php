<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BacaratResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Game;

class GameController extends Controller
{
    public function index()
    {
        return view('client/index');
    }

    public function slot($slug)
    {
        return view('client/slot');
    }
    //List game
    public function games(Request $request)
    {
        $games = (new Game())->getGame($request->query());

        if($request->get('parent_id') > 0){
            foreach($games as $game){
                $game->percentage = 10;
            }
        }
        return response([
            'meta' => null,
            'result' => $games,
            'status' => 'successful'
        ], 200);
    }

    /**
     * Detail game
     */
    public function detailGame($slug)
    {
        $game = (new Game())->getGame(['slug'=>$slug], true)->first();
        if($game) {
            return response([
                'meta' => null,
                'result' => $game,
                'status' => 'successful'
            ], 200);
        }else{
            return response([
                'meta' => null,
                'result' => null,
                'status' => 'fail'
            ], 404);
        }
    }

    /**
     * Percentage
     */
    public function percentage(Request $request)
    {
        $data = [];
        foreach($request->get('ids') as $id){
            $data[$id] = rand(20, 100);
        }

        return response([
            'status' => 'successful',
            'result' => $data
        ], 200);
    }
}
