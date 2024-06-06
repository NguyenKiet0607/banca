<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CreditController extends Controller
{
    //Function add credit
    public function add(Request $request)
    {
        if ($request->credit < 0) {
            return redirect()->back()->with('error', __('messages.credit_less_than_0'));
        }
        if ($request->model == 'user') {
            return $this->addCreditUser($request->id, $request->credit);
        }else{
            return $this->addCreditAdmin($request->id, $request->credit);
        }
    }

    //Function add credit to user
    public function addCreditUser($id, $credit)
    {
        $user = User::find($id);
        $userLogin = auth('admin')->user();
        $errorMessage = null;
        if (!$user) {
            $errorMessage = __('messages.users.not_found');
        }elseif ($userLogin->role === 2 && $userLogin->coin < $credit) { //Check if admin logged in has not enough credit
            $errorMessage = __('messages.users.admin_not_enough_credit');
        }
        if(is_null($errorMessage)){
            DB::beginTransaction();
            try {
                //Sub credit of admin logged in
                if ($userLogin->role === 2 && $credit > 0){
                    $userLogin->coin -= $credit;
                }
            //    $userLogin->total_credit += $credit;
                $userLogin->save();
                //Add credit to user
                $user->coin += $credit;
                $user->total_credit += $credit;
                if($user->coin <0)
                    $user->coin = 0;
                if($user)
                $user->save();
                DB::commit();
                return redirect()->back()->with('success', __('messages.users.add_credit_success'));
            } catch (\Exception $exception) {
                DB::rollBack();
                Log::error('Add credit error: '.$exception->getMessage());
                $errorMessage = __('messages.users.add_credit_fail');
            }
        }
        return redirect()->back()->with('error', $errorMessage);
    }

    //Function add credit to admin
    private function addCreditAdmin($id, $credit)
    {
        $this->middleware('admin.super');
        $admin = Admin::find($id);
        $userLogin = auth('admin')->user();
        $errorMessage = null;
        if (!$admin) {
            $errorMessage = __('messages.admins.not_found');
        }
        if(is_null($errorMessage)){
            DB::beginTransaction();
            try {
                //Add credit to admin
                $admin->coin += $credit;
                $admin->total_credit += $credit;
                $admin->save();
               // $userLogin->total_credit += $credit;
                $userLogin->save();
                DB::commit();
                return redirect()->back()->with('success', __('messages.admins.add_credit_success'));
            } catch (\Exception $exception) {
                DB::rollBack();
                Log::error('Add credit error: '.$exception->getMessage());
                $errorMessage = __('messages.admins.add_credit_fail');
            }
        }
        return redirect()->back()->with('error', $errorMessage);
    }
}
