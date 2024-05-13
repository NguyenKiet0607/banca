<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Code;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    //Get profile
    public function profile()
    {
        $user = auth()->user();
        $user->status = $user->status ? 'ACTIVE' : 'INACTIVE';

        return response([
            'status' => 'successful',
            'result' => $user
        ]);
    }

    //Create a new user
    public function store(Request $request)
    {
        //Validate data
        $input = $request->validate([
            'username' => 'required|unique:users',
            'phone' => 'required',
            'password' => 'required|confirmed',
            'code' => 'nullable'
        ]);

        try{
            $user = new User();
            $user->fill($input);
            $user->password = bcrypt($request->password);
            $user->status = 1;
            $user->save();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ]);
        }catch(\Exception $e){
            return response()->json([
                'code' => 500,
                'message' => $e->getMessage()
            ]);
        }

    }

    public function credit(Request $request)
    {
        $user = auth()->user();
        return response([
            'code' => 200,
            'credit' => $user->credit,
            'message' => 'success'
        ], 200);
    }

    public function code(Request $request)
    {
        $code = Code::getAll(['buy' => true, 'code' => $request->code],
            ['*'],
            true)->first();
        if ($code){
            $message = $code->status ? 'success' : 'used';
            $user = auth()->user();
            if ($code->status){
                DB::beginTransaction();
                try {
                    //increase credit to user
                    $user->credit += $code->credit;
                    $user->save();
                    //change status code
                    $code->status = 0;
                    $code->save();

                    DB::commit();
                }catch (\Exception $exception){
                    DB::rollBack();
                    Log::error('Increase credit error: '.$exception->getMessage());
                    return response([
                        'code' => 200,
                        'message' => 'Error'
                    ], 200);
                }
            }
            return response([
                'code' => 200,
                'credit' => $user->credit,
                'message' => $message
            ], 200);
        }
        return response([
            'code' => 404,
            'message' => 'Invalid'
        ], 200);
    }
}
