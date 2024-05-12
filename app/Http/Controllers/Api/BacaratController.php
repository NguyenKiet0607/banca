<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BacaratResult;
use App\Models\BacaratTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class BacaratController extends Controller
{
    public function table(Request $request, $code)
    {
        try {
            BacaratTable::firstOrCreate([
                'game_code' => $code,
                'table_id' => $request->tableId,
            ]);

            return response()->json([
                'code' => 200,
                'message' => 'success'
            ]);
        }catch (\Exception $exception){
            Log::error('Create bacarat table error: '.$exception->getMessage());
            return response()->json([
                'code' => 500,
                'message' => $exception->getMessage()
            ]);
        }
    }

    public function result(Request $request, $code)
    {
        $input = $request->all();
        $result = BacaratResult::query()->where(['game_code' => $code, 'table_id' => $input['tableId']])->first();
        try {
            if ($result){
                if ($input['currentGameShoe'] != $result->game_shoe){
                    $result->result = $input['result'];
                }elseif ($input['currentGameRound'] != $result->game_round){
                    $result->result = $result->result.$input['result'];
                }
                $result->game_shoe = $input['currentGameShoe'];
                $result->game_round = $input['currentGameRound'];
                $result->save();
            }else{
                $data['result'] = $input['result'];
                $data['table_id'] = $input['tableId'];
                $data['game_code'] = $code;
                $data['game_shoe'] = $input['currentGameShoe'];
                $data['game_round'] = $input['currentGameRound'];
                BacaratResult::query()->create($data);
            }

            return response()->json([
                'code' => 200,
                'message' => 'success'
            ]);
        }catch (\Exception $exception){
            Log::error('Create bacarat result error: '.$exception->getMessage());

            return response()->json([
                'code' => 500,
                'message' => $exception->getMessage()
            ]);
        }
    }

    public function results(Request $request, $code)
    {
        $input = $request->all();
        $result = BacaratResult::query()->where(['game_code' => $code, 'table_id' => $input['tableId']])->first();
        try {
            if ($result){
                $result->result = empty($input['results'])?"": $input['results'];
                $result->game_shoe = $input['currentGameShoe'];
                $result->game_round = $input['currentGameRound'];
                $result->save();
            }else{
                $data['result'] = empty($input['results'])?"": $input['results'];
                $data['table_id'] = $input['tableId'];
                $data['game_code'] = $code;
                $data['game_shoe'] = $input['currentGameShoe'];
                $data['game_round'] = $input['currentGameRound'];
                BacaratResult::query()->create($data);
            }

            return response()->json([
                'code' => 200,
                'message' => 'success'
            ]);
        }catch (\Exception $exception){
            Log::error('Create bacarat result error: '.$exception->getMessage());

            return response()->json([
                'code' => 500,
                'message' => $exception->getMessage()
            ]);
        }
    }

    //Get new result
    public function getNewResult(Request $request)
    {
        $input['game_code'] = $request->gameCode;
        if ($request->tableId){
            $input['table_id'] = $request->tableId;
        }

        $result = BacaratResult::query()
            ->where($input)
            ->whereBetween('updated_at', [Carbon::now()->subHour(), Carbon::now()])
            ->orderBy('table_id')->get();
        if ($result){
            return response()->json([
                'code' => 200,
                'message' => 'success',
                'data' => $result
            ]);
        }else{
            return response()->json([
                'code' => 404,
                'message' => 'Not found'
            ]);
        }
    }

    //Get formula data
    public function getFormulaData(Request $request)
    {
        $formulaFile = base_path('formula/formula.json');
        if (file_exists($formulaFile)){
            $formula = file_get_contents($formulaFile);
            $formula = json_decode($formula, true);
            $forType = $request->type ?? 1;
            $data = $formula[$forType - 1];

            return json_encode($data);
        }
        //Get a string include 4 character of string bpt
        $character = 'bpt';
        for ($i = 0; $i < 100; $i++){
            $string = '';
            for ($j = 0; $j < 4; $j++){
                $string .= $character[rand(0, strlen($character) - 1)];
            }
            $data[] = ["data" => $string];
        }

        return json_encode($data);
    }
}
