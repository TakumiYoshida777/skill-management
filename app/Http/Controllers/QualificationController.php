<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestQualification;
use App\Models\Qualification;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class QualificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $qualification = Qualification::all();
        return view('qualification',compact("qualification"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RequestQualification $request)
    {
        try{
            DB::beginTransaction();
            $user_id = Auth::user()->id;
            Qualification::create([
                'user_id' => $user_id,
                'name' => $request->name,
                'issue_date' => $request->issue_date,
                'expiry_date' => $request->expiry_date,
                'memo' => $request->memo
            ]);
            DB::commit();
        return redirect('qualification')->with('success',$request->name.'の登録が完了しました。');

        }catch(Exception $e) {
            Log::debug($e);
            DB::rollBack();
            return redirect('qualification')->withErrors("登録に失敗しました。※運営にお問い合わせください。")
            ->withInput();
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RequestQualification $request, string $id)
    {
        $user_id = Auth::user()->id;
        try {
            Qualification::query()
                ->where([
                    ['user_id', $user_id],
                    ['id', $id]
                ])
                ->update([
                    'user_id' => $user_id,
                    'name' => $request->name,
                    'issue_date' => $request->issue_date,
                    'expiry_date' => $request->expiry_date,
                    'memo' => $request->memo
                ]);
            return redirect('qualification')->with('status', $request->name . 'の内容を更新しました！');
        } catch (Exception $e) {
            Log::debug($e);
            DB::rollBack();
            return redirect('qualification')->withErrors("更新に失敗しました。※運営にお問い合わせください。")
                ->withInput();;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user_id = Auth::user()->id;

        try {
            $data = Qualification::query()->where([
                ['user_id', $user_id],
                ['id', $id]
            ])->first();
            $name = $data->name;
            $data->delete();
            return redirect('qualification')->with('status', $name . 'の内容を削除しました！');
        } catch (Exception $e) {
            Log::debug($e);
            DB::rollBack();
            return redirect('qualification')->withErrors("削除に失敗しました。※運営にお問い合わせください。")
                ->withInput();;
        }

    }
}
