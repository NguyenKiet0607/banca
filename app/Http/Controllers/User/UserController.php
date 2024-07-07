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

    //Decrease Coin
    public function decreaseCoin()
    {
        $user = auth()->user();
        $user->coin = $user->coin > 1 ? $user->coin - 1 : 0;
        $user->save();

        return response([
            'status' => 'successful',
            'result' => $user->coin
        ]);
    }

    //Create a new user
    public function store(Request $request)
    {
        //Validate data
        $input = $request->validate([
            'username' => 'required|min:6|max:20|unique:users',
            'phone' => 'nullable|min:10|max:15|unique:users',
            'phone_zalo' => 'nullable|min:10|max:15|unique:users',
            'password' => 'required|min:6|max:20',
        ],[
            'username.required' => 'Tên tài khoản là bắt buộc',
            'phone.required' => 'Số điện thoại là bắt buộc',
            'phone_zalo.required' => 'Số điện thoại zalo/tele là bắt buộc',
            'password.required' => 'Mật khẩu là bắt buộc',
            'username.min' => 'Tên tài khoản từ 6 đến 20 ký tự',
            'username.max' => 'Tên tài khoản từ 6 đến 20 ký tự',
            'phone.min' => 'Số điện thoại từ 10 đến 15 ký tự',
            'phone.max' => 'Số điện thoại từ 10 đến 15 ký tự',
            'phone_zalo.min' => 'Số điện thoại zalo/tele từ 10 đến 15 ký tự',
            'phone_zalo.max' => 'Số điện thoại zalo/tele từ 10 đến 15 ký tự',
            'password.min' => 'Mật khẩu từ 6 đến 20 ký tự',
            'password.max' => 'Mật khẩu từ 6 đến 20 ký tự',
            'password.confirmed' => 'Mật khẩu không khớp',
            'username.unique' => 'Tên tài khoản đã tồn tại',
            'phone.unique' => 'Số điện thoại đã tồn tại',
            'phone_zalo.unique' => 'Số điện thoại zalo/tele đã tồn tại',

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
            ], 500);
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
                    //increase coin to user
                    $user->coin += $code->credit;
                    $user->total_credit += $code->credit;
                    $user->save();
                    //change status code
                    $code->status = 0;
                    $code->use_by = $user->username;
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
                'total_credit' => $user->coin,
                'message' => $message
            ], 200);
        }
        return response([
            'code' => 404,
            'message' => 'Invalid'
        ], 200);
    }
}
