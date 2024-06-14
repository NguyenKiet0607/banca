<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (request()->ajax()) {
            return $this->datatables($request->all());
        }

        return view('admin.users.index', compact('request'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $input = $request->validated();
        try {
            $user = new User();
            $user->fill($input);
            $user->password = bcrypt($input['password']);
            $user->tenant_code = env('TENANT_CODE_DEFAULT', '001');
            if(auth('admin')->user()->role == 2){
                $user->tenant_code = auth('admin')->user()->tenant_code;
            }
            $user->save(); // save to db
            return redirect()->to(route('users.index'))
                ->with('success', __('messages.users.created_success'));
        } catch (\Exception $exception){
            Log::error('Create user error: '.$exception->getMessage());

            return redirect()->back()
                ->with('error', 'Create error');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view("admin.users.edit", compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $input = $request->validated();
        unset($input['username']);
        try {
            $user->fill($input);
            if (isset($input['password']) && $input['password'] != '') {
                $user->password = bcrypt($input['password']);
            }else{
                unset($user->password);
            }
            $user->save(); // save to db
            return redirect()->to(route('users.index'))
                ->with('success', __('messages.users.updated_success'));
        } catch (\Exception $exception){
            Log::error('Update user error: '.$exception->getMessage());

            return redirect()->back()
                ->with('error', __('messages.update_error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()->to(route('users.index'))
                ->with('success', __('messages.users.message_delete_success'));
        } catch (\Exception $exception){
            Log::error('Delete user error: '.$exception->getMessage());

            return redirect()->back()
                ->with('error', __('messages.delete_error'));
        }
    }

    /**
     * Get data passed into datatable
     *
     * @param array $request
     */
    public function datatables($request)
    {
        $userQuery = User::getAll($request,
            ['*'],
            true);
        return (new Datatables())->eloquent($userQuery)
            ->editColumn('status', function ($item) {
                return $item->status ? '<i class="text-success fa fa-circle"></i>'
                    : '<i class="text-danger fa fa-circle"></i>';
            })
            ->editColumn('phone', function ($item) {
                return (auth('admin')->user()->role == 2 ) ? null: $item->phone;
            })
            ->addColumn('action', function ($item) {
                return '<div class="btn btn-primary btn-xs credit" data-toggle="modal" data-id="'.$item->id.'" data-model="user"><i class="fa fa-credit-card">'.__('layouts.users.add_coin').'</i></div>'.
                    '<a class="btn btn-success btn-xs" href="' . route('users.edit', $item->id) . '">
                         <i class="fa fa-edit"></i> ' . __('layouts.btn_edit') . '</a>';
            })
            ->editColumn('id', function ($item) {
                return '<a href="' . route('admins.show', $item->id) . '">' . $item->id . '</a>';
            })
            ->rawColumns(['id', 'action', 'status'])
            ->make(true);
    }
}
