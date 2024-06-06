<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (request()->ajax()) {
            return $this->datatables($request->all());
        }

        return view('admin.admins.index', compact('request'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRequest $request)
    {
        $input = $request->validated();
        try {
            $admin = new Admin();
            $admin->fill($input);
            $admin->password = bcrypt($input['password']);
            $admin->save(); // save to db
            return redirect()->to(route('admins.index'))
                ->with('success', __('messages.admins.created_success'));
        } catch (\Exception $exception){
            Log::error('Create admin error: '.$exception->getMessage());

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
    public function edit(Admin $admin)
    {
        return view('admin.admins.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminRequest $request, Admin $admin)
    {
        $input = $request->validated();
        if (isset($input['password']) && $input['password'] != '') {
            $input['password'] = bcrypt($input['password']);
        } else {
            unset($input['password']);
        }
        try {
            $admin->update($input);
            return redirect()->to(route('admins.index'))
                ->with('success', __('messages.admins.updated_success'));
        } catch (\Exception $exception){
            Log::error('Update admin error: '.$exception->getMessage());

            return redirect()->back()
                ->with('error', __('messages.update_error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        try {
            $admin->delete();
            return redirect()->to(route('admins.index'))
                ->with('success', __('messages.admins.deleted_success'));
        } catch (\Exception $exception){
            Log::error('Delete admin error: '.$exception->getMessage());

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
        $adminQuery = Admin::getAll($request,
            ['id', 'username', 'email', 'role', 'status', 'coin','total_credit'],
            true);
        return (new Datatables())->eloquent($adminQuery)
            ->editColumn('role', function ($item) {
                return __('layouts.role.' . $item->role);
            })
            ->editColumn('status', function ($item) {
                return $item->status ? '<i class="text-success fa fa-circle"></i>'
                    : '<i class="text-danger fa fa-circle"></i>';
            })
            ->addColumn('action', function ($item) {
                $credit = $item->role == 2 ? '<div class="btn btn-primary btn-xs credit" data-toggle="modal" data-id="'.$item->id.'" data-model="admin"><i class="fa fa-credit-card">'.__('layouts.users.add_coin').'</i></div>' : '';
                return $credit.'<a class="btn btn-success btn-xs" href="' . route('admins.edit', $item->id) . '">
                         <i class="fa fa-edit"></i> ' . __('layouts.btn_edit') . '</a>';
            })
            ->editColumn('id', function ($item) {
                return '<a href="' . route('admins.show', $item->id) . '">' . $item->id . '</a>';
            })
            ->rawColumns(['id', 'action', 'status'])
            ->make(true);
    }
}
