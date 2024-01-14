<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestEngineerSkill;
use App\Models\EngineerSkillLanguage;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class EngineerSkillController extends Controller
{



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        // 言語のデータを取得
        $engineerSkillLanguages = EngineerSkillLanguage::where('user_id', $user->id)
            ->orderBy('name')
            ->get();
        $langs = DB::table('mst_langs')->select('name')->get();


        $variablesToCompact = [
            'user',
            'engineerSkillLanguages', 'langs',

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
        // $engineerSkillmonth = [
        //     "ALGOL" =>["month" => "5"]
        // ];

        // dd( $engineerSkillmonth["ALGOL"]["month"]);
        try {
            DB::beginTransaction();

            switch ($target) {
                case 'Language':
                    EngineerSkillLanguage::firstOrCreate([
                        'user_id' => $user_id,
                        'name' => $request->language,
                        'experience_months' => $request->month,
                    ]);
                    Log::info($target . '::' . 'success create!!');
                    break;

                case 'Framework':

                    Log::info($target . '::' . 'success create!!');
                    break;

                case 'Framework':

                    Log::info($target . '::' . 'success create!!');
                    break;
                case 'Framework':

                    Log::info($target . '::' . 'success create!!');
                    break;
                case 'Framework':

                    Log::info($target . '::' . 'success create!!');
                    break;
                case 'Framework':

                    Log::info($target . '::' . 'success create!!');
                    break;
            }

            DB::commit();
        } catch (Exception $e) {
            Log::debug($e);
            DB::rollBack();
        }

        return redirect('skills');
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

        $target = $request->target;
        // dd($request->all());
            switch ($target) {
                case 'Language':
                  EngineerSkillLanguage::where('id',$id)->update([
                        'experience_months' => $request->experience_months
                    ]);

                    Log::info($target . '::' . 'success create!!');
                    break;

                case 'Framework':

                    Log::info($target . '::' . 'success create!!');
                    break;

                case 'Framework':

                    Log::info($target . '::' . 'success create!!');
                    break;
                case 'Framework':

                    Log::info($target . '::' . 'success create!!');
                    break;
                case 'Framework':

                    Log::info($target . '::' . 'success create!!');
                    break;
                case 'Framework':

                    Log::info($target . '::' . 'success create!!');
                    break;
            }

        return redirect('skills');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $user = Auth::user();
        $target = $request->target;

        try {
            DB::beginTransaction();
            switch ($target) {
                case 'Language':
                    EngineerSkillLanguage::where([
                        ['user_id', $user->id],
                        ['id', $id]
                    ])->delete();
                    Log::info($target . '::' . 'success delete!!');
                    break;
            }

            DB::commit();
        } catch (Exception $e) {
            Log::debug($e);
            DB::rollBack();
        }
        return redirect('skills');
    }
}
