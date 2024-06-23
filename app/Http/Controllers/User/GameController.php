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
        $game = (new Game())->getGame(['slug' => $slug], true)->first();
        return view('client/slot', compact('game'));
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
        $game = (new Game())->where('slug', $slug)->orWhere('id', $slug)->first();
        if($game) {
            if($game->parent_id > 0){
                $gameParent = Game::find($game->parent_id);
                $game->parent = $gameParent;
            }
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
     * Detail Slot
     */

    public function detailSlot($slug, $id)
    {
        $game = Game::find($id);
        return view('client/detail-slot', compact('game'));
    }

    /**
     * Percentage
     */
    public function percentage(Request $request)
    {
        $games = Game::select('id', 'percent')->whereIn('id', $request->get('ids'))->get();
        $data = [];
        foreach($games as $game){
            if($game->percent >=100)
                $data[$game->id] = 100;
            else
                $data[$game->id] = $game->percent;
        }

        return response([
            'status' => 'successful',
            'result' => $data
        ], 200);
    }
}
