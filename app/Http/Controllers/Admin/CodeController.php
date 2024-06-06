<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CodeRequest;
use App\Models\Code;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class CodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (request()->ajax()) {
            return $this->datatables($request->all());
        }

        return view('admin.codes.index', compact('request'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.codes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CodeRequest $request)
    {
        $userLogin = auth('admin')->user();
        if ($userLogin->role === 2 && $userLogin->coin < $request->quantity * $request->credit) { //Check if admin logged in has not enough credit
            $errorMessage = __('messages.users.admin_not_enough_credit');
        }else{
            DB::beginTransaction();
            for ($i = 0; $i < $request->quantity; $i++){
                try {
                    $code = $this->generateCode();
                    $codeModel = new Code();
                    $data = [
                        'code' => $code,
                        'credit' => $request->credit,
                        'created_by' => Auth::guard('admin')->id()
                    ];
                    $codeModel->fill($data);
                    $codeModel->save();

                    //Sub credit of admin logged in
                    if ($userLogin->role === 2){
                        $userLogin->coin -= $request->credit;
                    }
                    //add total_credit
                    //$userLogin->total_credit += $request->credit;
                    $userLogin->save();
                }catch (\Exception $exception){
                    DB::rollBack();
                    Log::error('Create code error: '.$exception->getMessage());
                    $errorMessage = 'Create error';
                }
            }
            DB::commit();
            return redirect()->to(route('codes.index'))
                                    ->with('success', __('messages.codes.created_success'));
        }

        return redirect()->back()
                ->with('error', $errorMessage);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Code $code)
    {
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CodeRequest $request, Code $code)
    {
        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Get data passed into datatable
     *
     * @param array $request
     */
    public function datatables($request)
    {
        $codeQuery = Code::getAll($request,
            ['*'],
            true)->where('created_by', Auth::guard('admin')->id());
        return (new Datatables())->eloquent($codeQuery)
            ->editColumn('status', function ($item) {
                return $item->status ? '<i class="text-success fa fa-circle"></i>'
                    : '<i class="text-danger fa fa-circle"></i>';
            })
            ->editColumn('created_by', function ($item) {
                if($item->createdBy != null)
                    return $item->createdBy->username;
                return null;
            })
            ->rawColumns(['id', 'status'])
            ->make(true);
    }

    function generateCode($length = 10) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomString;
    }
}
