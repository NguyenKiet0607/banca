<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\User;
use App\Models\Code;
use Illuminate\Support\Facades\DB;

class ApiUserController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|min:6|max:20|unique:users',
            'phone' => 'required|min:10|max:15|unique:users',
            'phone_zalo' => 'required|min:10|max:15|unique:users',
            'password' => 'required|min:6|max:20|confirmed',
        ],[
            'username.required' => 'Tên tài khoản là bắt buộc',
            'phone.required' => 'Số điện thoại là bắt buộc',
            'phone_zalo.required' => 'Số điện thoại zalo/tele là bắt buộc',
            'password.required' => 'Mật khẩu là bắt buộc',
            'username.min' => 'Tên tài khoản từ 6 đến 20 ký tự',
            'username.max' => 'Tên tài khoản từ 6 đến 20 ký tự',
            'password.min' => 'Mật khẩu từ 6 đến 20 ký tự',
            'password.max' => 'Mật khẩu từ 6 đến 20 ký tự',
            'password.confirmed' => 'Mật khẩu không khớp',
            'username.unique' => 'Tên tài khoản đã tồn tại',
            'phone.unique' => 'Số điện thoại đã tồn tại',
            'phone_zalo.unique' => 'Số điện thoại zalo/tele đã tồn tại',

        ]);

        $input = $request->only(['username', 'phone', 'phone_zalo', 'password']);
        try{
            $user = new User();
            $user->fill($input);
            $user->password = bcrypt($request->password);
            $user->status = 1;
            $user->save();
            $token = JWTAuth::fromUser($user);

            return response()->json(compact('user', 'token'), 201);
        }catch(\Exception $e){
            return response()->json([
                'code' => 500,
                'message' => $e->getMessage()
            ]);
        }
    }

    //Decrease Coin
    public function decreaseCoin()
    {
        $user = auth()->guard('api')->user();
        $user->coin = $user->coin > 1 ? $user->coin - 1 : 0;
        $user->save();

        return response([
            'status' => 'successful',
            'result' => $user->coin
        ]);
    }

    //Nạp coin
    public function code(Request $request)
    {
        $code = Code::getAll(['buy' => true, 'code' => $request->code],
            ['*'],
            true)->first();
        if ($code){
            $message = $code->status ? 'success' : 'used';
            $user = auth()->guard('api')->user();
            if ($code->status){
                DB::beginTransaction();
                try {
                    //increase coin to user
                    $user->coin += $code->credit;
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
                'credit' => $user->coin,
                'message' => $message
            ], 200);
        }
        return response([
            'code' => 404,
            'message' => 'Invalid'
        ], 200);
    }
}
