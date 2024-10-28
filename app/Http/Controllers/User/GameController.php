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
        $games = (new Game())->getParentGames();
        return view('client/index', compact('games'));
    }

    public function slot($slug)
    {
        $game = (new Game())->getGame(['slug' => $slug], true)->first();
        $slots = (new Game())->getGame(['parent_id' => $game->id]);

        return view('client/slot', compact('game', 'slots'));
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
            if($game->round_start && $game->round_end){
                $game->round = Carbon::parse($game->round_start)->format('H:i').' - '.Carbon::parse($game->round_end)->format('H:i');
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
        $gameParent = Game::find($game->parent_id);
        return view('client/detail-slot', compact('game', 'slug', 'gameParent'));
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

    /**
     * Get game's round
     */
    public function round($slug)
    {
        $game = (new Game())->where('slug', $slug)->first();
        return response([
            'round' => $game ? Carbon::parse($game->round_start)->format('H:i').' - '.Carbon::parse($game->round_end)->format('H:i') : 'null - null',
            'count' => $game ? $game->round_count : 'null'
        ]);
    }
}
