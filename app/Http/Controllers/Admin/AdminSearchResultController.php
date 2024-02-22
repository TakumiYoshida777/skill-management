<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminSearchResultController extends Controller
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
     * 検索結果
     *
     * @param Request $request
     * @return void
     */
    public function result(Request $request)
    {
        $search_values = $request->all();

        $query = User::query()
            ->leftJoin('profiles', 'users.id', '=', 'profiles.user_id')
            ->leftJoin('projects', 'users.id', '=', 'projects.user_id')
            ->leftJoin('engineer_skill_os', 'users.id', '=', 'engineer_skill_os.user_id')
            ->leftJoin('engineer_skill_servers', 'users.id', '=', 'engineer_skill_servers.user_id')
            ->leftJoin('engineer_skill_databases', 'users.id', '=', 'engineer_skill_databases.user_id')
            ->leftJoin('engineer_skill_languages', 'users.id', '=', 'engineer_skill_languages.user_id')
            ->leftJoin('engineer_skill_frameworks', 'users.id', '=', 'engineer_skill_frameworks.user_id')
            ->leftJoin('engineer_skill_middleware', 'users.id', '=', 'engineer_skill_middleware.user_id')
            ->leftJoin('engineer_skill_virtual_environments', 'users.id', '=', 'engineer_skill_virtual_environments.user_id')
            ->leftJoin('engineer_skill_version_management', 'users.id', '=', 'engineer_skill_version_management.user_id')
            ->select(
                'users.id',
                'users.first_name',
                'users.last_name',
                'profiles.division',
                'profiles.position',
                'profiles.industry_experience',
            );

        $requirement_definition_flag = $search_values["requirement_definition_flag"] ?? null;
        $basic_design_flag = $search_values["basic_design_flag"] ?? null;
        $detailed_design_flag = $search_values["detailed_design_flag"] ?? null;
        $db_design_flag = $search_values["db_design_flag"] ?? null;
        $programming_flag = $search_values["programming_flag"] ?? null;
        $unit_test_flag = $search_values["unit_test_flag"] ?? null;
        $integration_test_flag = $search_values["integration_test_flag"] ?? null;
        $system_test_flag = $search_values["system_test_flag"] ?? null;
        $operation_test_flag = $search_values["operation_test_flag"] ?? null;
        $system_migration_flag = $search_values["system_migration_flag"] ?? null;
        $operation_maintenance_flag = $search_values["operation_maintenance_flag"] ?? null;

        // 検索キーワードの配列の全ての値を条件に加える
        //プロジェクト名
        if ($search_values["project_name"]) {
            $query->where('projects.name', 'like', '%' . $search_values["project_name"] . '%');
        }
        //業界経験月数
        if ($search_values["industry_experience"]) {
            $query->where('profiles.industry_experience', '>=', intval($search_values["industry_experience"]));
        }

        // プロフィール
        if ($requirement_definition_flag === "on") {
            $query->where('profiles.requirement_definition_flag', true);
        }
        if ($basic_design_flag === "on") {
            $query->where('profiles.basic_design_flag', true);
        }
        if ($detailed_design_flag === "on") {
            $query->where('profiles.detailed_design_flag', true);
        }
        if ($db_design_flag === "on") {
            $query->where('profiles.db_design_flag', true);
        }
        if ($programming_flag === "on") {
            $query->where('profiles.programming_flag', true);
        }
        if ($unit_test_flag === "on") {
            $query->where('profiles.unit_test_flag', true);
        }
        if ($integration_test_flag === "on") {
            $query->where('profiles.integration_test_flag', true);
        }
        if ($system_test_flag === "on") {
            $query->where('profiles.system_test_flag', true);
        }
        if ($operation_test_flag === "on") {
            $query->where('profiles.operation_test_flag', true);
        }
        if ($system_migration_flag === "on") {
            $query->where('profiles.system_migration_flag', true);
        }
        if ($operation_maintenance_flag === "on") {
            $query->where('profiles.operation_maintenance_flag', true);
        }

        // エンジニアスキル
        if (!empty($search_values["used_language"])) {
            $query->whereIn('engineer_skill_languages.name', $search_values["used_language"]);
        }
        if (!empty($search_values["used_framework"])) {
            $query->whereIn('engineer_skill_frameworks.name', $search_values["used_framework"]);
        }
        if (!empty($search_values["used_database"])) {
            $query->whereIn('engineer_skill_databases.name', $search_values["used_database"]);
        }
        if (!empty($search_values["used_middleware"])) {
            $query->whereIn('engineer_skill_middleware.name', $search_values["used_middleware"]);
        }
        if (!empty($search_values["used_os"])) {
            $query->whereIn('engineer_skill_os.name', $search_values["used_os"]);
        }
        if (!empty($search_values["used_server"])) {
            $query->whereIn('engineer_skill_servers.name', $search_values["used_server"]);
        }
        if (!empty($search_values["used_virtual_environment"])) {
            $query->whereIn('engineer_skill_virtual_environments.name', $search_values["used_virtual_environment"]);
        }
        if (!empty($search_values["used_version_management"])) {
            $query->whereIn('engineer_skill_version_management.name', $search_values["used_version_management"]);
        }

        /**
         * 検索キーワードからサブクエリで絞り込み
         */
        if ($request->searchType == "andSearch") {
            //and検索
            $query->where(function ($q) use ($search_values) {
                //プロジェクト名
                if ($search_values["project_name"] ?? null) {
                    $q->whereExists(function ($subQuery) use ($search_values) {
                        $subQuery->select(DB::raw(1))
                            ->from('projects')
                            ->whereColumn('projects.user_id', 'users.id')
                            ->where('projects.name', 'like', '%' . $search_values["project_name"] . '%');
                    });
                }
                //業界経験月数
                if ($search_values["project_name"] ?? null) {
                    $q->whereExists(function ($subQuery) use ($search_values) {
                        $subQuery->select(DB::raw(1))
                            ->from('projects')
                            ->whereColumn('projects.user_id', 'users.id')
                            ->where('profiles.industry_experience', '>=', intval($search_values["industry_experience"]));
                    });
                }

                //要件定義
                if ($search_values["requirement_definition_flag"] ?? null) {
                    $q->whereExists(function ($subQuery) {
                        $subQuery->select(DB::raw(1))
                            ->from('profiles')
                            ->whereColumn('profiles.user_id', 'users.id')
                            ->where('profiles.requirement_definition_flag', true);
                    });
                }
                //基本設計
                if ($search_values["basic_design_flag"] ?? null) {
                    $q->whereExists(function ($subQuery) {
                        $subQuery->select(DB::raw(1))
                            ->from('profiles')
                            ->whereColumn('profiles.user_id', 'users.id')
                            ->where('profiles.basic_design_flag', true);
                    });
                }
                //詳細設計
                if ($search_values["detailed_design_flag"] ?? null) {
                    $q->whereExists(function ($subQuery) {
                        $subQuery->select(DB::raw(1))
                            ->from('profiles')
                            ->whereColumn('profiles.user_id', 'users.id')
                            ->where('profiles.detailed_design_flag', true);
                    });
                }
                //DB設計
                if ($search_values["db_design_flag"] ?? null) {
                    $q->whereExists(function ($subQuery) {
                        $subQuery->select(DB::raw(1))
                            ->from('profiles')
                            ->whereColumn('profiles.user_id', 'users.id')
                            ->where('profiles.db_design_flag', true);
                    });
                }
                //開発
                if ($search_values["programming_flag"] ?? null) {
                    $q->whereExists(function ($subQuery) {
                        $subQuery->select(DB::raw(1))
                            ->from('profiles')
                            ->whereColumn('profiles.user_id', 'users.id')
                            ->where('profiles.programming_flag', true);
                    });
                }
                //単体テスト
                if ($search_values["unit_test_flag"] ?? null) {
                    $q->whereExists(function ($subQuery) {
                        $subQuery->select(DB::raw(1))
                            ->from('profiles')
                            ->whereColumn('profiles.user_id', 'users.id')
                            ->where('profiles.unit_test_flag', true);
                    });
                }
                //結合テスト
                if ($search_values["integration_test_flag"] ?? null) {
                    $q->whereExists(function ($subQuery) {
                        $subQuery->select(DB::raw(1))
                            ->from('profiles')
                            ->whereColumn('profiles.user_id', 'users.id')
                            ->where('profiles.integration_test_flag', true);
                    });
                }
                //総合テスト
                if ($search_values["system_test_flag"] ?? null) {
                    $q->whereExists(function ($subQuery) {
                        $subQuery->select(DB::raw(1))
                            ->from('profiles')
                            ->whereColumn('profiles.user_id', 'users.id')
                            ->where('profiles.system_test_flag', true);
                    });
                }
                //運用テスト
                if ($search_values["operation_test_flag"] ?? null) {
                    $q->whereExists(function ($subQuery) {
                        $subQuery->select(DB::raw(1))
                            ->from('profiles')
                            ->whereColumn('profiles.user_id', 'users.id')
                            ->where('profiles.operation_test_flag', true);
                    });
                }
                //システム移行
                if ($search_values["system_migration_flag"] ?? null) {
                    $q->whereExists(function ($subQuery) {
                        $subQuery->select(DB::raw(1))
                            ->from('profiles')
                            ->whereColumn('profiles.user_id', 'users.id')
                            ->where('profiles.system_migration_flag', true);
                    });
                }
                //運用・保守
                if ($search_values["operation_maintenance_flag"] ?? null) {
                    $q->whereExists(function ($subQuery) {
                        $subQuery->select(DB::raw(1))
                            ->from('profiles')
                            ->whereColumn('profiles.user_id', 'users.id')
                            ->where('profiles.operation_maintenance_flag', true);
                    });
                }

                //言語
                if (!empty($search_values["used_language"])) {
                    foreach ($search_values["used_language"] as  $value) {
                        $q->whereExists(function ($subQuery) use ($value) {
                            $subQuery->select(DB::raw(1))
                                ->from('engineer_skill_languages')
                                ->whereColumn('engineer_skill_languages.user_id', 'users.id')
                                ->where('engineer_skill_languages.name', $value);
                        });
                    }
                }
                //フレームワーク
                if (!empty($search_values["used_framework"])) {
                    foreach ($search_values["used_framework"] as  $value) {
                        $q->whereExists(function ($subQuery) use ($value) {
                            $subQuery->select(DB::raw(1))
                                ->from('engineer_skill_frameworks')
                                ->whereColumn('engineer_skill_frameworks.user_id', 'users.id')
                                ->where('engineer_skill_frameworks.name', $value);
                        });
                    }
                }
                //DB
                if (!empty($search_values["used_database"])) {
                    foreach ($search_values["used_database"] as  $value) {
                        $q->whereExists(function ($subQuery) use ($value) {
                            $subQuery->select(DB::raw(1))
                                ->from('engineer_skill_databases')
                                ->whereColumn('engineer_skill_databases.user_id', 'users.id')
                                ->where('engineer_skill_databases.name', $value);
                        });
                    }
                }
                //OS
                if (!empty($search_values["used_os"])) {
                    foreach ($search_values["used_os"] as  $value) {
                        $q->whereExists(function ($subQuery) use ($value) {
                            $subQuery->select(DB::raw(1))
                                ->from('engineer_skill_os')
                                ->whereColumn('engineer_skill_os.user_id', 'users.id')
                                ->where('engineer_skill_os.name', $value);
                        });
                    }
                }
                //サーバー
                if (!empty($search_values["used_server"])) {
                    foreach ($search_values["used_server"] as  $value) {
                        $q->whereExists(function ($subQuery) use ($value) {
                            $subQuery->select(DB::raw(1))
                                ->from('engineer_skill_servers')
                                ->whereColumn('engineer_skill_servers.user_id', 'users.id')
                                ->where('engineer_skill_servers.name', $value);
                        });
                    }
                }
                //ミドルウェア
                if (!empty($search_values["used_middleware"])) {
                    foreach ($search_values["used_middleware"] as  $value) {
                        $q->whereExists(function ($subQuery) use ($value) {
                            $subQuery->select(DB::raw(1))
                                ->from('engineer_skill_middleware')
                                ->whereColumn('engineer_skill_middleware.user_id', 'users.id')
                                ->where('engineer_skill_middleware.name', $value);
                        });
                    }
                }
                //仮想環境
                if (!empty($search_values["used_virtual_environment"])) {
                    foreach ($search_values["used_virtual_environment"] as  $value) {
                        $q->whereExists(function ($subQuery) use ($value) {
                            $subQuery->select(DB::raw(1))
                                ->from('engineer_skill_virtual_environments')
                                ->whereColumn('engineer_skill_virtual_environments.user_id', 'users.id')
                                ->where('engineer_skill_virtual_environments.name', $value);
                        });
                    }
                }
                //バージョン管理
                if (!empty($search_values["used_version_management"])) {
                    foreach ($search_values["used_version_management"] as  $value) {
                        $q->whereExists(function ($subQuery) use ($value) {
                            $subQuery->select(DB::raw(1))
                                ->from('engineer_skill_version_management')
                                ->whereColumn('engineer_skill_version_management.user_id', 'users.id')
                                ->where('engineer_skill_version_management.name', $value);
                        });
                    }
                }
            });
        } else {
            //or検索
            $query->where(function ($q) use ($search_values) {
                //プロジェクト名
                if ($search_values["project_name"] ?? null) {
                    $q->whereExists(function ($subQuery) use ($search_values) {
                        $subQuery->select(DB::raw(1))
                            ->from('projects')
                            ->whereColumn('projects.user_id', 'users.id')
                            ->orWhere('projects.name', 'like', '%' . $search_values["project_name"] . '%');
                    });
                }
                //業界経験月数
                if ($search_values["project_name"] ?? null) {
                    $q->whereExists(function ($subQuery) use ($search_values) {
                        $subQuery->select(DB::raw(1))
                            ->from('projects')
                            ->whereColumn('projects.user_id', 'users.id')
                            ->orWhere('profiles.industry_experience', '>=', intval($search_values["industry_experience"]));
                    });
                }

                //要件定義
                if ($search_values["requirement_definition_flag"] ?? null) {
                    $q->whereExists(function ($subQuery) {
                        $subQuery->select(DB::raw(1))
                            ->from('profiles')
                            ->whereColumn('profiles.user_id', 'users.id')
                            ->orWhere('profiles.requirement_definition_flag', true);
                    });
                }
                //基本設計
                if ($search_values["basic_design_flag"] ?? null) {
                    $q->whereExists(function ($subQuery) {
                        $subQuery->select(DB::raw(1))
                            ->from('profiles')
                            ->whereColumn('profiles.user_id', 'users.id')
                            ->orWhere('profiles.basic_design_flag', true);
                    });
                }
                //詳細設計
                if ($search_values["detailed_design_flag"] ?? null) {
                    $q->whereExists(function ($subQuery) {
                        $subQuery->select(DB::raw(1))
                            ->from('profiles')
                            ->whereColumn('profiles.user_id', 'users.id')
                            ->orWhere('profiles.detailed_design_flag', true);
                    });
                }
                //DB設計
                if ($search_values["db_design_flag"] ?? null) {
                    $q->whereExists(function ($subQuery) {
                        $subQuery->select(DB::raw(1))
                            ->from('profiles')
                            ->whereColumn('profiles.user_id', 'users.id')
                            ->orWhere('profiles.db_design_flag', true);
                    });
                }
                //開発
                if ($search_values["programming_flag"] ?? null) {
                    $q->whereExists(function ($subQuery) {
                        $subQuery->select(DB::raw(1))
                            ->from('profiles')
                            ->whereColumn('profiles.user_id', 'users.id')
                            ->orWhere('profiles.programming_flag', true);
                    });
                }
                //単体テスト
                if ($search_values["unit_test_flag"] ?? null) {
                    $q->whereExists(function ($subQuery) {
                        $subQuery->select(DB::raw(1))
                            ->from('profiles')
                            ->whereColumn('profiles.user_id', 'users.id')
                            ->orWhere('profiles.unit_test_flag', true);
                    });
                }
                //結合テスト
                if ($search_values["integration_test_flag"] ?? null) {
                    $q->whereExists(function ($subQuery) {
                        $subQuery->select(DB::raw(1))
                            ->from('profiles')
                            ->whereColumn('profiles.user_id', 'users.id')
                            ->orWhere('profiles.integration_test_flag', true);
                    });
                }
                //総合テスト
                if ($search_values["system_test_flag"] ?? null) {
                    $q->whereExists(function ($subQuery) {
                        $subQuery->select(DB::raw(1))
                            ->from('profiles')
                            ->whereColumn('profiles.user_id', 'users.id')
                            ->orWhere('profiles.system_test_flag', true);
                    });
                }
                //運用テスト
                if ($search_values["operation_test_flag"] ?? null) {
                    $q->whereExists(function ($subQuery) {
                        $subQuery->select(DB::raw(1))
                            ->from('profiles')
                            ->whereColumn('profiles.user_id', 'users.id')
                            ->orWhere('profiles.operation_test_flag', true);
                    });
                }
                //システム移行
                if ($search_values["system_migration_flag"] ?? null) {
                    $q->whereExists(function ($subQuery) {
                        $subQuery->select(DB::raw(1))
                            ->from('profiles')
                            ->whereColumn('profiles.user_id', 'users.id')
                            ->orWhere('profiles.system_migration_flag', true);
                    });
                }
                //運用・保守
                if ($search_values["operation_maintenance_flag"] ?? null) {
                    $q->whereExists(function ($subQuery) {
                        $subQuery->select(DB::raw(1))
                            ->from('profiles')
                            ->whereColumn('profiles.user_id', 'users.id')
                            ->orWhere('profiles.operation_maintenance_flag', true);
                    });
                }

                //言語
                if (!empty($search_values["used_language"])) {
                    foreach ($search_values["used_language"] as  $value) {
                        $q->whereExists(function ($subQuery) use ($value) {
                            $subQuery->select(DB::raw(1))
                                ->from('engineer_skill_languages')
                                ->whereColumn('engineer_skill_languages.user_id', 'users.id')
                                ->orWhere('engineer_skill_languages.name', $value);
                        });
                    }
                }
                //フレームワーク
                if (!empty($search_values["used_framework"])) {
                    foreach ($search_values["used_framework"] as  $value) {
                        $q->whereExists(function ($subQuery) use ($value) {
                            $subQuery->select(DB::raw(1))
                                ->from('engineer_skill_frameworks')
                                ->whereColumn('engineer_skill_frameworks.user_id', 'users.id')
                                ->orWhere('engineer_skill_frameworks.name', $value);
                        });
                    }
                }
                //DB
                if (!empty($search_values["used_database"])) {
                    foreach ($search_values["used_database"] as  $value) {
                        $q->whereExists(function ($subQuery) use ($value) {
                            $subQuery->select(DB::raw(1))
                                ->from('engineer_skill_databases')
                                ->whereColumn('engineer_skill_databases.user_id', 'users.id')
                                ->orWhere('engineer_skill_databases.name', $value);
                        });
                    }
                }
                //OS
                if (!empty($search_values["used_os"])) {
                    foreach ($search_values["used_os"] as  $value) {
                        $q->whereExists(function ($subQuery) use ($value) {
                            $subQuery->select(DB::raw(1))
                                ->from('engineer_skill_os')
                                ->whereColumn('engineer_skill_os.user_id', 'users.id')
                                ->orWhere('engineer_skill_os.name', $value);
                        });
                    }
                }
                //サーバー
                if (!empty($search_values["used_server"])) {
                    foreach ($search_values["used_server"] as  $value) {
                        $q->whereExists(function ($subQuery) use ($value) {
                            $subQuery->select(DB::raw(1))
                                ->from('engineer_skill_servers')
                                ->whereColumn('engineer_skill_servers.user_id', 'users.id')
                                ->orWhere('engineer_skill_servers.name', $value);
                        });
                    }
                }
                //ミドルウェア
                if (!empty($search_values["used_middleware"])) {
                    foreach ($search_values["used_middleware"] as  $value) {
                        $q->whereExists(function ($subQuery) use ($value) {
                            $subQuery->select(DB::raw(1))
                                ->from('engineer_skill_middleware')
                                ->whereColumn('engineer_skill_middleware.user_id', 'users.id')
                                ->orWhere('engineer_skill_middleware.name', $value);
                        });
                    }
                }
                //仮想環境
                if (!empty($search_values["used_virtual_environment"])) {
                    foreach ($search_values["used_virtual_environment"] as  $value) {
                        $q->whereExists(function ($subQuery) use ($value) {
                            $subQuery->select(DB::raw(1))
                                ->from('engineer_skill_virtual_environments')
                                ->whereColumn('engineer_skill_virtual_environments.user_id', 'users.id')
                                ->orWhere('engineer_skill_virtual_environments.name', $value);
                        });
                    }
                }
                //バージョン管理
                if (!empty($search_values["used_version_management"])) {
                    foreach ($search_values["used_version_management"] as  $value) {
                        $q->whereExists(function ($subQuery) use ($value) {
                            $subQuery->select(DB::raw(1))
                                ->from('engineer_skill_version_management')
                                ->whereColumn('engineer_skill_version_management.user_id', 'users.id')
                                ->orWhere('engineer_skill_version_management.name', $value);
                        });
                    }
                }
            });
        }

        $users = $query->groupBy(
            'users.id',
            'users.first_name',
            'users.last_name',
            'profiles.division',
            'profiles.position',
            'profiles.industry_experience',
        )->get();

        return view('admin.search_result', compact('users'));
    }
}
