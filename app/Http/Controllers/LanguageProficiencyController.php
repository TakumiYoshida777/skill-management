<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestLanguageProficiency;
use App\Models\LanguageProficiency;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LanguageProficiencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::user()->id;

        $language_proficiencies = LanguageProficiency::all();

        return view('language_proficiency', compact("language_proficiencies","user_id"));
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
    public function store(RequestLanguageProficiency $request)
    {
        $user_id = Auth::user()->id;
        try {
            DB::beginTransaction();
            LanguageProficiency::create([
                'user_id' => $user_id,
                'name' => $request->name,
                'learning_method' => $request->learning_method,
                'total_date' => $request->total_date,
                'read_status' => $request->read_status,
                'write_status' => $request->write_status,
                'conversation_status' => $request->conversation_status,
                'memo' => $request->memo,
            ]);
            DB::commit();
            return redirect('language_proficiency')->with('status', '外国語スキルの登録が完了しました！');
        } catch (Exception $e) {
            Log::debug($e);
            DB::rollBack();
            return redirect('language_proficiency')->withErrors("登録に失敗しました。※運営にお問い合わせください。")
                ->withInput();;
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
    public function update(RequestLanguageProficiency $request, string $id)
    {
        $user_id = Auth::user()->id;
        try {

            LanguageProficiency::query()
                ->where([
                    ['user_id', $user_id],
                    ['id', $id]
                ])
                ->update([
                    'user_id' => $user_id,
                    'name' => $request->name,
                    'learning_method' => $request->learning_method,
                    'total_date' => $request->total_date,
                    'read_status' => $request->read_status,
                    'write_status' => $request->write_status,
                    'conversation_status' => $request->conversation_status,
                    'memo' => $request->memo,
                ]);
            return redirect('language_proficiency')->with('status', $request->name . 'の内容を更新しました！');
        } catch (Exception $e) {
            Log::debug($e);
            DB::rollBack();
            return redirect('language_proficiency')->withErrors("更新に失敗しました。※運営にお問い合わせください。")
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
            $data = LanguageProficiency::query()->where([
                ['user_id', $user_id],
                ['id', $id]
            ])->first();
            $name = $data->name;
            $data->delete();
            return redirect('language_proficiency')->with('status', $name . 'の内容を削除しました！');
        } catch (Exception $e) {
            Log::debug($e);
            DB::rollBack();
            return redirect('language_proficiency')->withErrors("削除に失敗しました。※運営にお問い合わせください。")
                ->withInput();;
        }
    }
}
