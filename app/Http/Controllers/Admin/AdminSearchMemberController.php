<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminSearchMemberController extends Controller
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
        $langs =  $this->getSkillNameList('mst_langs');
        $frameworks = $this->getSkillNameList('mst_frameworks');
        $databases = $this->getSkillNameList('mst_databases');
        $middlewares = $this->getSkillNameList('mst_middlewares');
        $oses = $this->getSkillNameList('mst_oses');
        $servers = $this->getSkillNameList('mst_servers');
        $virtual_environments = $this->getSkillNameList('mst_virtual_environments');
        $version_management = $this->getSkillNameList('mst_version_managements');

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
        return view('admin.search_member', compact($variablesToCompact));
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
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
