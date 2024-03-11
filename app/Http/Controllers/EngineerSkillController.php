<?php

namespace App\Http\Controllers;

use App\Consts\AutoCompleteConst;
use App\Http\Requests\RequestEngineerSkill;
use App\Models\EngineerSkillDatabase;
use App\Models\EngineerSkillFramework;
use App\Models\EngineerSkillLanguage;
use App\Models\EngineerSkillMiddleware;
use App\Models\EngineerSkillOs;
use App\Models\EngineerSkillServer;
use App\Models\EngineerSkillVersionManagement;
use App\Models\EngineerSkillVirtualEnvironment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class EngineerSkillController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //ログインされていなければアクセス拒否
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        /**
         * ユーザーの技術体験データの取得
         */
        // 言語
        $engineerSkillLanguages = EngineerSkillLanguage::query()->where('user_id', $user->id)
            ->orderBy('name')
            ->get();

        // フレームワーク
        $engineerSkillFrameworks = EngineerSkillFramework::query()->where('user_id', $user->id)
            ->orderBy('name')
            ->get();

        // データベース
        $engineerSkillDatabases = EngineerSkillDatabase::query()->where('user_id', $user->id)
            ->orderBy('name')
            ->get();

        // ミドルウェア
        $engineerSkillMiddlewares = EngineerSkillMiddleware::query()->where('user_id', $user->id)
            ->orderBy('name')
            ->get();

        // OS
        $engineerSkillOses = EngineerSkillOs::query()->where('user_id', $user->id)
            ->orderBy('name')
            ->get();

        // サーバー
        $engineerSkillServers = EngineerSkillServer::query()->where('user_id', $user->id)
            ->orderBy('name')
            ->get();

        // 仮想環境
        $engineerSkillVirtualEnvironments = EngineerSkillVirtualEnvironment::query()->where('user_id', $user->id)
            ->orderBy('name')
            ->get();

        // バージョン管理システム
        $engineerSkillVersionManagement = EngineerSkillVersionManagement::query()->where('user_id', $user->id)
            ->orderBy('name')
            ->get();


        /**
         * オートコンプリート用リストの取得
         */
        // 言語
        $langs =  AutoCompleteConst::LANGUAGE;
        // フレームワーク
        $frameworks = AutoCompleteConst::FRAMEWORK;
        //データベース
        $databases = AutoCompleteConst::DATABASE;
        // ミドルウェア
        $middlewares = AutoCompleteConst::MIDDLWARE;
        // OS
        $oses = AutoCompleteConst::OS;
        // サーバー
        $servers = AutoCompleteConst::SERVER;
        // 仮想環境
        $virtualEnvironments = AutoCompleteConst::VIRTUAL_ENVIRONMENT;
        // バージョン管理システム
        $versionManagement = AutoCompleteConst::VERSION_MANAGEMENT;

        $variablesToCompact = [
            'user',
            'engineerSkillLanguages', 'langs',
            'engineerSkillFrameworks', 'frameworks',
            'engineerSkillDatabases', 'databases',
            'engineerSkillMiddlewares', 'middlewares',
            'engineerSkillOses', 'oses',
            'engineerSkillServers', 'servers',
            'engineerSkillVirtualEnvironments', 'virtualEnvironments',
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
    // public function store(RequestEngineerSkill $request)
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
                    break;

                case 'Framework':
                    EngineerSkillFramework::firstOrCreate([
                        'user_id' => $user_id,
                        'name' => $request->Framework,
                        'experience_months' => $request->month,
                    ]);
                    break;

                case 'Database':
                    EngineerSkillDatabase::firstOrCreate([
                        'user_id' => $user_id,
                        'name' => $request->Database,
                        'experience_months' => $request->month,
                    ]);
                    break;
                case 'Middleware':
                    EngineerSkillMiddleware::firstOrCreate([
                        'user_id' => $user_id,
                        'name' => $request->Middleware,
                        'experience_months' => $request->month,
                    ]);
                    break;
                case 'OS':
                    EngineerSkillOs::firstOrCreate([
                        'user_id' => $user_id,
                        'name' => $request->OS,
                        'experience_months' => $request->month,
                    ]);
                    break;
                case 'Server':
                    EngineerSkillServer::firstOrCreate([
                        'user_id' => $user_id,
                        'name' => $request->Server,
                        'experience_months' => $request->month,
                    ]);
                    break;
                case 'VirtualEnvironment':
                    EngineerSkillVirtualEnvironment::firstOrCreate([
                        'user_id' => $user_id,
                        'name' => $request->VirtualEnvironment,
                        'experience_months' => $request->month,
                    ]);
                    break;
                case 'VersionManagement':
                    EngineerSkillVersionManagement::firstOrCreate([
                        'user_id' => $user_id,
                        'name' => $request->VersionManagement,
                        'experience_months' => $request->month,
                    ]);
                    break;
            }
            DB::commit();
            Log::info($target . '::' . 'success create!!');
            return redirect('skills')->with('status', $target . 'の登録が完了しました！');
        } catch (Exception $e) {
            Log::debug($e);
            DB::rollBack();
            return redirect('skills')->withErrors("登録に失敗しました。")
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
    public function update(Request $request, string $id)
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
            DB::commit();
            return redirect('skills')->with('status', $message_title . 'の内容を更新しました！');
        } catch (Exception $e) {
            Log::debug($e);
            DB::rollBack();
            return redirect('qualification')->withErrors("更新に失敗しました。")
                ->withInput();;
        }
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
            return redirect('skills')->with('status', $message_title . 'の削除が完了しました！');;
        } catch (Exception $e) {
            Log::debug($e);
            DB::rollBack();
            return redirect('qualification')->withErrors("削除に失敗しました。")
                ->withInput();;
        }
    }
}
