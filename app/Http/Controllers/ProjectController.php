<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestProject;
use App\Models\Project;
use App\Models\ProjectUsedDatabase;
use App\Models\ProjectUsedFramework;
use App\Models\ProjectUsedLanguage;
use App\Models\ProjectUsedMiddleware;
use App\Models\ProjectUsedOs;
use App\Models\ProjectUsedServer;
use App\Models\ProjectUsedVersionManagement;
use App\Models\ProjectUsedVirtualEnvironment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProjectController extends Controller
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
     * スキルのマスタデータから名前のリスト取得する
     *
     * @param string $tableName　テーブル名
     * @return $result
     */
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

        $user_id = Auth::user()->id;
        $projects = Project::query()
            ->where('user_id', $user_id)
            ->get();

        return view('project_list', compact('projects', 'user_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $langs =  $this->getSkillNameList('mst_langs');
        $frameworks = $this->getSkillNameList('mst_frameworks');
        $databases = $this->getSkillNameList('mst_databases');
        $middlewares = $this->getSkillNameList('mst_middlewares');
        $oses = $this->getSkillNameList('mst_oses');
        $servers = $this->getSkillNameList('mst_servers');
        $virtual_environments = $this->getSkillNameList('mst_virtual_environments');
        $version_management = $this->getSkillNameList('mst_version_managements');

        // dd($virtual_environments);

        $variablesToCompact = [
            'langs',
            'frameworks',
            'databases',
            'middlewares',
            'oses',
            'servers',
            'virtual_environments',
            'version_management'
        ];
        return view('project_create', compact($variablesToCompact));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RequestProject $request)
    {
        $user_id = Auth::user()->id;
        // dd($request->all());
        try {
            DB::beginTransaction();
            $project = Project::query()
                ->create([
                    "user_id" =>  $user_id,
                    "name" =>  $request->name,
                    "description" =>  $request->description,
                    "start_date" =>  $request->start_date,
                    "end_date" =>  $request->end_date,
                    "team_size" =>  $request->team_size,
                    "all_team_size" =>  $request->all_team_size,
                    "position" =>  $request->position,
                    "requirement_definition_flag" =>  $request->requirement_definition_flag == "on" ? 1 : 0,
                    "basic_design_flag" =>  $request->basic_design_flag  == "on" ? 1 : 0,
                    "detailed_design_flag" =>  $request->detailed_design_flag  == "on" ? 1 : 0,
                    "db_design_flag" =>  $request->db_design_flag == "on" ? 1 : 0,
                    "programming_flag" =>  $request->programming_flag == "on" ? 1 : 0,
                    "unit_test_flag" =>  $request->unit_test_flag == "on" ? 1 : 0,
                    "integration_test_flag" =>  $request->integration_test_flag  == "on" ? 1 : 0,
                    "system_test_flag" =>  $request->system_test_flag == "on" ? 1 : 0,
                    "operation_test_flag" =>  $request->operation_test_flag == "on" ? 1 : 0,
                    "system_migration_flag" =>  $request->system_migration_flag == "on" ? 1 : 0,
                    "operation_maintenance_flag" =>  $request->operation_maintenance_flag == "on" ? 1 : 0,
                ]);

            if (isset($request->used_language)) {
                foreach ($request->used_language as $data) {
                    ProjectUsedLanguage::query()
                        ->create([
                            "project_id" => $project->id,
                            "name" => $data
                        ]);
                }
            }
            if (isset($request->used_os)) {
                foreach ($request->used_os as $data) {
                    ProjectUsedOs::query()
                        ->create([
                            "project_id" => $project->id,
                            "name" => $data
                        ]);
                }
            }
            if (isset($request->used_framework)) {

                foreach ($request->used_framework as $data) {
                    ProjectUsedFramework::query()
                        ->create([
                            "project_id" => $project->id,
                            "name" => $data
                        ]);
                }
            }
            if (isset($request->used_database)) {

                foreach ($request->used_database as $data) {
                    ProjectUsedDatabase::query()
                        ->create([
                            "project_id" => $project->id,
                            "name" => $data
                        ]);
                }
            }
            if (isset($request->middleware)) {

                foreach ($request->middleware as $data) {
                    ProjectUsedMiddleware::query()
                        ->create([
                            "project_id" => $project->id,
                            "name" => $data
                        ]);
                }
            }
            if (isset($request->servers)) {

                foreach ($request->servers as $data) {
                    ProjectUsedServer::query()
                        ->create([
                            "project_id" => $project->id,
                            "name" => $data
                        ]);
                }
            }
            if (isset($request->servers)) {
                foreach ($request->servers as $data) {
                    ProjectUsedVersionManagement::query()
                        ->create([
                            "project_id" => $project->id,
                            "name" => $data
                        ]);
                }
            }
            if (isset($request->version_management)) {

                foreach ($request->version_management as $data) {
                    ProjectUsedVersionManagement::query()
                        ->create([
                            "project_id" => $project->id,
                            "name" => $data
                        ]);
                }
            }
            DB::commit();
            return redirect('project')->with('status', '新規プロジェクトの登録が完了しました！');
        } catch (Exception $e) {
            Log::debug($e);
            DB::rollback();
            return redirect('project')->withErrors("登録に失敗しました。")
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
        $user_id = Auth::user()->id;
        // dd($id);

        /**
         * オートコンプリート用取得リスト
         */
        $langs =  $this->getSkillNameList('mst_langs');
        $frameworks = $this->getSkillNameList('mst_frameworks');
        $databases = $this->getSkillNameList('mst_databases');
        $middlewares = $this->getSkillNameList('mst_middlewares');
        $oses = $this->getSkillNameList('mst_oses');
        $servers = $this->getSkillNameList('mst_servers');
        $virtual_environments = $this->getSkillNameList('mst_virtual_environments');
        $versionManagement = $this->getSkillNameList('mst_version_managements');

        /**
         * 更新対象のプロジェクトを取得
         */
        $projectData = Project::query()
            ->where([
                ['id', $id],
                ['user_id', $user_id]
            ])->first();
        // dd($targetProject);

        /**
         * 使用言語
         */
        $used_languages = ProjectUsedLanguage::query()
            ->where("project_id", $id)
            ->get();
        // dd($used_languags);

        /**
         * 使用フレームワーク
         */
        $used_frameworks = ProjectUsedFramework::query()
            ->where("project_id", $id)
            ->get();

        /**
         * 使用データベース
         */
        $used_databases = ProjectUsedDatabase::query()
            ->where("project_id", $id)
            ->get();

        /**
         * 使用ミドルウェア
         */
        $used_middlewares = ProjectUsedMiddleware::query()
            ->where("project_id", $id)
            ->get();

        /**
         * 使用OS
         */
        $used_oses = ProjectUsedOs::query()
            ->where("project_id", $id)
            ->get();
        /**
         * 使用データベース
         */
        $used_servers = ProjectUsedServer::query()
            ->where("project_id", $id)
            ->get();
        /**
         * 使用仮想環境
         */
        $used_virtual_environments = ProjectUsedVirtualEnvironment::query()
            ->where("project_id", $id)
            ->get();
        /**
         * バージョン管理システム
         */
        $used_version_management = ProjectUsedVersionManagement::query()
            ->where("project_id", $id)
            ->get();

        $variablesToCompact = [
            'projectData',
            'langs',
            'frameworks',
            'databases',
            'middlewares',
            'oses',
            'servers',
            'virtual_environments',
            'versionManagement',
            'used_languages',
            'used_frameworks',
            'used_databases',
            'used_middlewares',
            'used_oses',
            'used_servers',
            'used_virtual_environments',
            'used_version_management',
        ];

        return view('project_edit', compact($variablesToCompact));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RequestProject $request, string $id)
    {
        $user_id = Auth::user()->id;
        // dd($request->used_language);
        $req = $request->all();
        try {
            DB::beginTransaction();
            Project::where('id', $id)->update([
                "user_id" =>  $user_id,
                "name" =>  $request->name,
                "description" =>  $request->description,
                "start_date" =>  $request->start_date,
                "end_date" =>  $request->end_date,
                "team_size" =>  $request->team_size,
                "all_team_size" =>  $request->all_team_size,
                "position" =>  $request->position,
                "requirement_definition_flag" =>  $request->requirement_definition_flag == "on" ? 1 : 0,
                "basic_design_flag" =>  $request->basic_design_flag  == "on" ? 1 : 0,
                "detailed_design_flag" =>  $request->detailed_design_flag  == "on" ? 1 : 0,
                "db_design_flag" =>  $request->db_design_flag == "on" ? 1 : 0,
                "programming_flag" =>  $request->programming_flag == "on" ? 1 : 0,
                "unit_test_flag" =>  $request->unit_test_flag == "on" ? 1 : 0,
                "integration_test_flag" =>  $request->integration_test_flag  == "on" ? 1 : 0,
                "system_test_flag" =>  $request->system_test_flag == "on" ? 1 : 0,
                "operation_test_flag" =>  $request->operation_test_flag == "on" ? 1 : 0,
                "system_migration_flag" =>  $request->system_migration_flag == "on" ? 1 : 0,
                "operation_maintenance_flag" =>  $request->operation_maintenance_flag == "on" ? 1 : 0,
            ]);

            //言語の更新
            if (isset($request->used_language)) {
                //入力された言語を全て取得
                $used_languages = $request->used_language;

                // 既存データの初期化
                ProjectUsedLanguage::query()
                    ->where("project_id", $id)
                    ->delete(); // 既存のデータを削除


                //入力された値で全て更新
                foreach ($used_languages as $data) {
                    ProjectUsedLanguage::query()
                        ->updateOrCreate([
                            "project_id" => $id,
                            "name" => $data
                        ]); // 新しいデータを作成
                }
            } else {
                //値が何もなければ全て削除
                ProjectUsedLanguage::query()
                    ->where("project_id", $id)
                    ->delete();
            }

            //フレームワークの更新
            if (isset($request->used_framework)) {
                //入力されたフレームワークを全て取得
                $used_frameworks = $request->used_framework;
                $unique_used_frameworks = array_unique($used_frameworks);

                //既存データの初期化
                ProjectUsedFramework::query()
                    ->where("project_id", $id)
                    ->delete(); // 既存のデータを削除

                //入力された値で全て更新
                foreach ($unique_used_frameworks as $data) {
                    ProjectUsedFramework::query()
                        ->updateOrCreate([
                            "project_id" => $id,
                            "name" => $data
                        ]); // 新しいデータを作成
                }
            } else {
                //値が何もなければ全て削除
                ProjectUsedFramework::query()
                    ->where("project_id", $id)
                    ->delete();
            }

            //データベースの更新
            if (isset($request->used_database)) {
                //入力されたデータベースを全て取得
                $used_databases = $request->used_database;
                //既存データの初期化
                ProjectUsedDatabase::query()
                    ->where("project_id", $id)
                    ->delete(); // 既存のデータを削除

                //入力された値で全て更新
                foreach ($used_databases as $data) {
                    ProjectUsedDatabase::query()
                        ->updateOrCreate([
                            "project_id" => $id,
                            "name" => $data
                        ]); // 新しいデータを作成
                }
            } else {
                //値が何もなければ全て削除
                ProjectUsedDatabase::query()
                    ->where("project_id", $id)
                    ->delete();
            }

            //ミドルウェアの更新
            if (isset($request->used_middleware)) {
                //入力されたミドルウェアを全て取得
                $used_middlewares = $request->used_middleware;
                //既存データの初期化
                ProjectUsedMiddleware::query()
                    ->where("project_id", $id)
                    ->delete(); // 既存のデータを削除

                //入力された値で全て更新
                foreach ($used_middlewares as $data) {
                    ProjectUsedMiddleware::query()
                        ->updateOrCreate([
                            "project_id" => $id,
                            "name" => $data
                        ]); // 新しいデータを作成
                }
            } else {
                //値が何もなければ全て削除
                ProjectUsedMiddleware::query()
                    ->where("project_id", $id)
                    ->delete();
            }

            //OSの更新
            if (isset($request->used_os)) {
                //入力されたOSを全て取得
                $used_oses = $request->used_os;
                //既存データの初期化
                ProjectUsedOs::query()
                    ->where("project_id", $id)
                    ->delete(); // 既存のデータを削除

                //入力された値で全て更新
                foreach ($used_oses as $data) {
                    ProjectUsedOs::query()
                        ->updateOrCreate([
                            "project_id" => $id,
                            "name" => $data
                        ]); // 新しいデータを作成
                }
            } else {
                //値が何もなければ全て削除
                ProjectUsedOs::query()
                    ->where("project_id", $id)
                    ->delete();
            }

            //サーバーの更新
            if (isset($request->used_server)) {
                //入力されたサーバーを全て取得
                $used_servers = $request->used_server;
                //既存データの初期化
                ProjectUsedServer::query()
                    ->where("project_id", $id)
                    ->delete(); // 既存のデータを削除

                //入力された値で全て更新
                foreach ($used_servers as $data) {
                    ProjectUsedServer::query()
                        ->updateOrCreate([
                            "project_id" => $id,
                            "name" => $data
                        ]); // 新しいデータを作成
                }
            } else {
                //値が何もなければ全て削除
                ProjectUsedServer::query()
                    ->where("project_id", $id)
                    ->delete();
            }

            //仮想環境の更新
            if (isset($request->used_virtual_environment)) {
                //入力されたサーバーを全て取得
                $used_virtual_environments = $request->used_virtual_environment;
                //既存データの初期化
                ProjectUsedVirtualEnvironment::query()
                    ->where("project_id", $id)
                    ->delete(); // 既存のデータを削除

                //入力された値で全て更新
                foreach ($used_virtual_environments as $data) {
                    ProjectUsedVirtualEnvironment::query()
                        ->updateOrCreate([
                            "project_id" => $id,
                            "name" => $data
                        ]); // 新しいデータを作成
                }
            } else {
                //値が何もなければ全て削除
                ProjectUsedVirtualEnvironment::query()
                    ->where("project_id", $id)
                    ->delete();
            }

            //バージョン管理システムの更新
            if (isset($request->used_version_management)) {
                //入力されたサーバーを全て取得
                $used_version_managements = $request->used_version_management;
                //既存データの初期化
                ProjectUsedVersionManagement::query()
                    ->where("project_id", $id)
                    ->delete(); // 既存のデータを削除

                //入力された値で全て更新
                foreach ($used_version_managements as $data) {
                    ProjectUsedVersionManagement::query()
                        ->updateOrCreate([
                            "project_id" => $id,
                            "name" => $data
                        ]); // 新しいデータを作成
                }
            } else {
                //値が何もなければ全て削除
                ProjectUsedVersionManagement::query()
                    ->where("project_id", $id)
                    ->delete();
            }
            DB::commit();
            return redirect('project')->with('status', "プロジェクト内容の更新に成功しました。");
        } catch (Exception $e) {
            Log::debug($e);
            DB::rollback();
            return redirect('project')->withErrors("登録に失敗しました。")
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            $data = Project::query()
                ->where("id", $id)
                ->first();

            $data->delete();
            DB::commit();
            return redirect('project')->with('status', "プロジェクト" . $data->name . "を削除しました。");
        } catch (Exception $e) {
            Log::debug($e);
            DB::rollback();
            return redirect('project')->withErrors("登録に失敗しました。")
                ->withInput();
        }
    }
}
