<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;
use Yajra\DataTables\DataTables;
use App\Http\Requests\GameRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use File;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (request()->ajax()) {
            return $this->datatables($request->all());
        }

        return view('admin.games.index', compact('request'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $gameParent = (new Game())->getGame(['parent_id' => 0]);
        return view('admin.games.create', compact('gameParent'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GameRequest $request)
    {
        $input = $request->validated();
        try {
            // Kiểm tra xem request có chứa file ảnh không
            if ($request->hasFile('image_url')) {
                // Lưu file ảnh vào thư mục public/images và lấy đường dẫn
                $file = $request->file('image_url');
                $newFileName = time().'_'.$file->getClientOriginalName();
                $imagePath = $file->move(public_path('/images'), $newFileName);
                $input['image_url'] = $newFileName;
            }
            $game = new Game();
            $game->fill($input);
            $game->save(); // save to db
            return redirect()->to(route('games.index'))
                ->with('success', __('messages.games.created_success'));
        } catch (\Exception $exception){
            Log::error('Create game error: '.$exception->getMessage());

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
    public function edit(Game $game)
    {
        $gameParent = (new Game())->getGame(['parent_id' => 0]);
        return view('admin.games.edit', compact('game', 'gameParent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GameRequest $request, Game $game)
    {
        $input = $request->validated();
        try {
            // Kiểm tra xem request có chứa file ảnh không
            if ($request->hasFile('image_url')) {
                // Lưu file ảnh vào thư mục public/images và lấy đường dẫn
                $file = $request->file('image_url');
                $newFileName = time().'_'.$file->getClientOriginalName();
                $imagePath = $file->move(public_path('/images'), $newFileName);
                $input['image_url'] = $newFileName;

                //Xóa ảnh cũ
                // Nếu hình ảnh cũ tồn tại
                if (Storage::disk('public')->exists('public/images/'.$game->image_url)) {
                    // Xóa hình ảnh cũ
                    Storage::disk('public')->delete('public/images/'.$game->image_url);
                }
            }
            $game->update($input);
            return redirect()->to(route('games.index'))
                ->with('success', __('messages.games.updated_success'));
        } catch (\Exception $exception){
            Log::error('Update game error: '.$exception->getMessage());

            return redirect()->back()
                ->with('error', __('messages.update_error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        try {
            //Xóa ảnh cũ
            // Nếu hình ảnh cũ tồn tại
            if (Storage::disk('public')->exists('public/images/'.$game->image_url)) {
                // Xóa hình ảnh cũ
                Storage::disk('public')->delete('public/images/'.$game->image_url);
            }
            $game->delete();
            return redirect()->to(route('games.index'))
                ->with('success', __('messages.games.deleted_success'));
        } catch (\Exception $exception){
            Log::error('Delete game error: '.$exception->getMessage());

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
        $gameQuery = (new Game())->getGame($request, true);
        return (new Datatables())->eloquent($gameQuery)
            ->addColumn('action', function ($item) {
                $credit = $item->role == 2 ? '<div class="btn btn-primary btn-xs credit" data-toggle="modal" data-id="'.$item->id.'" data-model="admin"><i class="fa fa-credit-card">'.__('layouts.users.add_coin').'</i></div>' : '';
                return $credit.'<a class="btn btn-success btn-xs" href="' . route('games.edit', $item->id) . '">
                         <i class="fa fa-edit"></i> ' . __('layouts.btn_edit') . '</a>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
