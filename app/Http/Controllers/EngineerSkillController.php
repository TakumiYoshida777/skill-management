<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestEngineerSkill;
use App\Models\EngineerSkillDatabase;
use App\Models\EngineerSkillFramework;
use App\Models\EngineerSkillLanguage;
use App\Models\EngineerSkillMiddleware;
use App\Models\EngineerSkillOs;
use App\Models\EngineerSkillServer;
use App\Models\EngineerSkillVersionManagement;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class EngineerSkillController extends Controller
{


    public function getSkillNameList(string $tableName)
    {
        $result = DB::table($tableName)->select('name')->orderBy('name')->get();
        return $result;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        // 言語のデータを取得
        $engineerSkillLanguages = EngineerSkillLanguage::query()->where('user_id', $user->id)
            ->orderBy('name')
            ->get();
        $langs =  $this->getSkillNameList('mst_langs');


        //フレームワークのデータを取得
        $engineerSkillFrameworks = EngineerSkillFramework::query()->where('user_id', $user->id)
            ->orderBy('name')
            ->get();
        $frameworks = $this->getSkillNameList('mst_frameworks');

        //データベースのデータを取得
        $engineerSkillDatabases = EngineerSkillDatabase::query()->where('user_id', $user->id)
            ->orderBy('name')
            ->get();
        $databases = $this->getSkillNameList('mst_databases');

        //ミドルウェアのデータを取得
        $engineerSkillMiddlewares = EngineerSkillMiddleware::query()->where('user_id', $user->id)
            ->orderBy('name')
            ->get();
        $middlewares = $this->getSkillNameList('mst_middlewares');

        //OSのデータを取得
        $engineerSkillOses = EngineerSkillOs::query()->where('user_id', $user->id)
            ->orderBy('name')
            ->get();
        $oses = $this->getSkillNameList('mst_oses');

        //サーバーのデータを取得
        $engineerSkillServers = EngineerSkillServer::query()->where('user_id', $user->id)
            ->orderBy('name')
            ->get();
        $servers = $this->getSkillNameList('mst_servers');

        //バージョン管理システムのデータを取得
        $engineerSkillVersionManagement = EngineerSkillVersionManagement::query()->where('user_id', $user->id)
            ->orderBy('name')
            ->get();
        $versionManagement = $this->getSkillNameList('mst_version_managements');

        $variablesToCompact = [
            'user',
            'engineerSkillLanguages', 'langs',
            'engineerSkillFrameworks', 'frameworks',
            'engineerSkillDatabases', 'databases',
            'engineerSkillMiddlewares', 'middlewares',
            'engineerSkillOses', 'oses',
            'engineerSkillServers', 'servers',
            'engineerSkillVersionManagement', 'versionManagement',
        ];
        return view('engineer_skill', compact($variablesToCompact));
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
    public function store(RequestEngineerSkill $request)
    {
        $user_id = Auth::user()->id;
        $target = $request->target;
        // dd($request->all());
        try {
            DB::beginTransaction();

            switch ($target) {
                case 'Language':
                    EngineerSkillLanguage::firstOrCreate([
                        'user_id' => $user_id,
                        'name' => $request->Language,
                        'experience_months' => $request->month,
                    ]);
                    Log::info($target . '::' . 'success create!!');
                    break;

                case 'Framework':
                    EngineerSkillFramework::firstOrCreate([
                        'user_id' => $user_id,
                        'name' => $request->Framework,
                        'experience_months' => $request->month,
                    ]);
                    Log::info($target . '::' . 'success create!!');
                    break;

                case 'Database':
                    EngineerSkillDatabase::firstOrCreate([
                        'user_id' => $user_id,
                        'name' => $request->Database,
                        'experience_months' => $request->month,
                    ]);
                    Log::info($target . '::' . 'success create!!');
                    break;
                case 'Middleware':
                    EngineerSkillMiddleware::firstOrCreate([
                        'user_id' => $user_id,
                        'name' => $request->Middleware,
                        'experience_months' => $request->month,
                    ]);
                    Log::info($target . '::' . 'success create!!');
                    break;
                case 'OS':
                    EngineerSkillOs::firstOrCreate([
                        'user_id' => $user_id,
                        'name' => $request->OS,
                        'experience_months' => $request->month,
                    ]);
                    Log::info($target . '::' . 'success create!!');
                    break;
                case 'Server':
                    EngineerSkillServer::firstOrCreate([
                        'user_id' => $user_id,
                        'name' => $request->Server,
                        'experience_months' => $request->month,
                    ]);
                    Log::info($target . '::' . 'success create!!');
                    break;
                case 'VersionManagement':
                    EngineerSkillVersionManagement::firstOrCreate([
                        'user_id' => $user_id,
                        'name' => $request->VersionManagement,
                        'experience_months' => $request->month,
                    ]);
                    Log::info($target . '::' . 'success create!!');
                    break;
            }

            DB::commit();
        } catch (Exception $e) {
            Log::debug($e);
            DB::rollBack();
        }

        return redirect('skills')->with('status', $target . 'の登録が完了しました！');
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
    public function update(Request $request, string $id)
    {
        $user = Auth::user();
        $target = $request->target;
        $message_title = "";
        // dd($request->all());
        switch ($target) {
            case 'Language':
                $data = EngineerSkillLanguage::query()->where([
                        ['user_id', $user->id],
                        ['id', $id]
                    ])->first();
                $data->update([
                    'experience_months' => $request->experience_months
                ]);
                $message_title = $data->name;
                Log::info($target . '::' . 'success create!!');
                break;

            case 'Framework':

                $data = EngineerSkillFramework::query()->where([
                        ['user_id', $user->id],
                        ['id', $id]
                    ])->first();
                $data->update([
                    'experience_months' => $request->experience_months
                ]);
                $message_title = $data->name;
                Log::info($target . '::' . 'success create!!');
                break;

            case 'Database':
                $data = EngineerSkillDatabase::query()->where([
                        ['user_id', $user->id],
                        ['id', $id]
                    ])->first();
                $data->update([
                    'experience_months' => $request->experience_months
                ]);
                $message_title = $data->name;
                Log::info($target . '::' . 'success create!!');
                break;
            case 'Middleware':
                $data = EngineerSkillMiddleware::query()->where([
                        ['user_id', $user->id],
                        ['id', $id]
                    ])->first();
                $data->update([
                    'experience_months' => $request->experience_months
                ]);
                $message_title = $data->name;
                Log::info($target . '::' . 'success create!!');
                break;
            case 'OS':
                $data = EngineerSkillOs::query()->where([
                        ['user_id', $user->id],
                        ['id', $id]
                    ])->first();
                $data->update([
                    'experience_months' => $request->experience_months
                ]);
                $message_title = $data->name;
                Log::info($target . '::' . 'success create!!');
                break;
            case 'Server':
                $data = EngineerSkillServer::query()->where([
                        ['user_id', $user->id],
                        ['id', $id]
                    ])->first();
                $data->update([
                    'experience_months' => $request->experience_months
                ]);
                $message_title = $data->name;
                Log::info($target . '::' . 'success create!!');
                break;
            case 'VersionManagement':
                $data = EngineerSkillVersionManagement::query()->where([
                        ['user_id', $user->id],
                        ['id', $id]
                    ])->first();
                $data->update([
                    'experience_months' => $request->experience_months
                ]);
                $message_title = $data->name;
                Log::info($target . '::' . 'success create!!');
                break;
        }

        return redirect('skills')->with('status', $message_title . 'の内容を更新しました！');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $user = Auth::user();
        $target = $request->target;
        $message_title = "";

        try {
            DB::beginTransaction();
            switch ($target) {
                case 'Language':
                    $data = EngineerSkillLanguage::query()->where([
                        ['user_id', $user->id],
                        ['id', $id]
                    ])->first();
                    $data->delete();

                    $message_title = $data->name;
                    Log::info($target . '::' . 'success delete!!');
                    break;
                case 'Framework':
                    $data = EngineerSkillFramework::query()->where([
                        ['user_id', $user->id],
                        ['id', $id]
                    ])->first();
                    $data->delete();

                    $message_title = $data->name;
                    Log::info($target . '::' . 'success create!!');
                    break;

                case 'Database':
                    $data = EngineerSkillDatabase::query()->where([
                        ['user_id', $user->id],
                        ['id', $id]
                    ])->first();
                    $data->delete();

                    $message_title = $data->name;
                    Log::info($target . '::' . 'success create!!');
                    break;
                case 'Middleware':
                    $data = EngineerSkillMiddleware::query()->where([
                        ['user_id', $user->id],
                        ['id', $id]
                    ])->first();
                    $data->delete();

                    $message_title = $data->name;
                    Log::info($target . '::' . 'success create!!');
                    break;
                case 'OS':
                    $data = EngineerSkillOs::query()->where([
                        ['user_id', $user->id],
                        ['id', $id]
                    ])->first();
                    $data->delete();

                    $message_title = $data->name;
                    Log::info($target . '::' . 'success create!!');
                    break;
                case 'Server':
                    $data = EngineerSkillServer::query()->where([
                        ['user_id', $user->id],
                        ['id', $id]
                    ])->first();
                    $data->delete();

                    $message_title = $data->name;
                    Log::info($target . '::' . 'success create!!');
                    break;
                case 'VersionManagement':
                    $data = EngineerSkillVersionManagement::query()->where([
                        ['user_id', $user->id],
                        ['id', $id]
                    ])->first();
                    $data->delete();

                    $message_title = $data->name;
                    Log::info($target . '::' . 'success create!!');
                    break;
            }

            DB::commit();
        } catch (Exception $e) {
            Log::debug($e);
            DB::rollBack();
        }
        return redirect('skills')->with('status', $message_title . 'の削除が完了しました！');;
    }
}
