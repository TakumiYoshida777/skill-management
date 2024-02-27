<?php

namespace App\Http\Controllers;

use App\Models\EngineerSkillDatabase;
use App\Models\EngineerSkillFramework;
use App\Models\EngineerSkillLanguage;
use App\Models\EngineerSkillMiddleware;
use App\Models\EngineerSkillOs;
use App\Models\EngineerSkillServer;
use App\Models\EngineerSkillVersionManagement;
use App\Models\EngineerSkillVirtualEnvironment;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use PDF;

class SkillSheetController extends Controller
{
    /**
     * 頭文字定数
     */
    public const INITIAL_ALPHABET_TABLE = [
        'あ' => 'A',  'い' => 'I',   'う' => 'U',   'え' => 'E',  'お' => 'O',
        'か' => 'K', 'き' => 'K',  'く' => 'K',  'け' => 'K', 'こ' => 'K',
        'さ' => 'S', 'し' => 'S', 'す' => 'S',  'せ' => 'S', 'そ' => 'S',
        'た' => 'T', 'ち' => 'C', 'つ' => 'TS', 'て' => 'T', 'と' => 'T',
        'な' => 'N', 'に' => 'N',  'ぬ' => 'N',  'ね' => 'N', 'の' => 'N',
        'は' => 'H', 'ひ' => 'H',  'ふ' => 'H',  'へ' => 'H', 'ほ' => 'H',
        'ま' => 'M', 'み' => 'M',  'む' => 'M',  'め' => 'M', 'も' => 'M',
        'や' => 'Y', 'ゆ' => 'Y',  'よ' => 'Y',
        'ら' => 'R', 'り' => 'R',  'る' => 'R',  'れ' => 'R', 'ろ' => 'R',
        'わ' => 'W', 'ゐ' => 'I',   'ゑ' => 'E',   'を' => 'O',
        'が' => 'G', 'ぎ' => 'G',  'ぐ' => 'G',  'げ' => 'G', 'ご' => 'G',
        'ざ' => 'Z', 'じ' => 'J',  'ず' => 'Z',  'ぜ' => 'Z', 'ぞ' => 'Z',
        'だ' => 'D', 'ぢ' => 'J',  'づ' => 'Z',  'で' => 'D', 'ど' => 'D',
        'ば' => 'B', 'び' => 'B',  'ぶ' => 'B',  'べ' => 'B', 'ぼ' => 'B',
        'ぱ' => 'P', 'ぴ' => 'P',  'ぷ' => 'P',  'ぺ' => 'P', 'ぽ' => 'P',
        'きゃ' => 'K', 'きゅ' => 'K', 'きょ' => 'K',
        'しゃ' => 'S', 'しゅ' => 'S', 'しょ' => 'S',
        'ちゃ' => 'C', 'ちゅ' => 'C', 'ちょ' => 'C',
        'にゃ' => 'N', 'にゅ' => 'N', 'にょ' => 'N',
        'ひゃ' => 'H', 'ひゅ' => 'H', 'ひょ' => 'H',
        'みゃ' => 'M', 'みゅ' => 'M', 'みゅ' => 'M',
        'りゃ' => 'R', 'りゅ' => 'R', 'りょ' => 'R',
        'ぎゃ' => 'G', 'ぎゅ' => 'G', 'ぎょ' => 'G',
        'じゃ' => 'J',  'じゅ' => 'J',  'じょ' => 'J',
        'びゃ' => 'B', 'びゅ' => 'B', 'びょ' => 'B',
        'ぴゃ' => 'P', 'ぴゅ' => 'P', 'ぴょ' => 'P',
        'ア' => 'A', 'イ' => 'I', 'ウ' => 'U', 'エ' => 'E', 'オ' => 'O',
        'カ' => 'K', 'キ' => 'K', 'ク' => 'K', 'ケ' => 'K', 'コ' => 'K',
        'サ' => 'S', 'シ' => 'S', 'ス' => 'S', 'セ' => 'S', 'ソ' => 'S',
        'タ' => 'T', 'チ' => 'C', 'ツ' => 'TS', 'テ' => 'T', 'ト' => 'T',
        'ナ' => 'N', 'ニ' => 'N', 'ヌ' => 'N', 'ネ' => 'N', 'ノ' => 'N',
        'ハ' => 'H', 'ヒ' => 'H', 'フ' => 'H', 'ヘ' => 'H', 'ホ' => 'H',
        'マ' => 'M', 'ミ' => 'M', 'ム' => 'M', 'メ' => 'M', 'モ' => 'M',
        'ヤ' => 'Y', 'ユ' => 'Y', 'ヨ' => 'Y',
        'ラ' => 'R', 'リ' => 'R', 'ル' => 'R', 'レ' => 'R', 'ロ' => 'R',
        'ワ' => 'W', 'ヰ' => 'I', 'ヱ' => 'E', 'ヲ' => 'O',
        'ガ' => 'G', 'ギ' => 'G', 'グ' => 'G', 'ゲ' => 'G', 'ゴ' => 'G',
        'ザ' => 'Z', 'ジ' => 'J', 'ズ' => 'Z', 'ゼ' => 'Z', 'ゾ' => 'Z',
        'ダ' => 'D', 'ヂ' => 'J', 'ヅ' => 'Z', 'デ' => 'D', 'ド' => 'D',
        'バ' => 'B', 'ビ' => 'B', 'ブ' => 'B', 'ベ' => 'B', 'ボ' => 'B',
        'パ' => 'P', 'ピ' => 'P', 'プ' => 'P', 'ペ' => 'P', 'ポ' => 'P',
        'キャ' => 'K', 'キュ' => 'K', 'キョ' => 'K',
        'シャ' => 'S', 'シュ' => 'S', 'ショ' => 'S',
        'チャ' => 'C', 'チュ' => 'C', 'チョ' => 'C',
        'ニャ' => 'N', 'ニュ' => 'N', 'ニョ' => 'N',
        'ヒャ' => 'H', 'ヒュ' => 'H', 'ヒョ' => 'H',
        'ミャ' => 'M', 'ミュ' => 'M', 'ミョ' => 'M',
        'リャ' => 'R', 'リュ' => 'R', 'リョ' => 'R',
        'ギャ' => 'G', 'ギュ' => 'G', 'ギョ' => 'G',
        'ジャ' => 'J', 'ジュ' => 'J', 'ジョ' => 'J',
        'ビャ' => 'B', 'ビュ' => 'B', 'ビョ' => 'B',
        'ピャ' => 'P', 'ピュ' => 'P', 'ピョ' => 'P',
        'ｱ' => 'A', 'ｲ' => 'I', 'ｳ' => 'U', 'ｴ' => 'E', 'ｵ' => 'O',
        'ｶ' => 'K', 'ｷ' => 'K', 'ｸ' => 'K', 'ｹ' => 'K', 'ｺ' => 'K',
        'ｻ' => 'S', 'ｼ' => 'S', 'ｽ' => 'S', 'ｾ' => 'S', 'ｿ' => 'S',
        'ﾀ' => 'T', 'ﾁ' => 'C', 'ﾂ' => 'TS', 'ﾃ' => 'T', 'ﾄ' => 'T',
        'ﾅ' => 'N', 'ﾆ' => 'N', 'ﾇ' => 'N', 'ﾈ' => 'N', 'ﾉ' => 'N',
        'ﾊ' => 'H', 'ﾋ' => 'H', 'ﾌ' => 'H', 'ﾍ' => 'H', 'ﾎ' => 'H',
        'ﾏ' => 'M', 'ﾐ' => 'M', 'ﾑ' => 'M', 'ﾒ' => 'M', 'ﾓ' => 'M',
        'ﾔ' => 'Y', 'ﾕ' => 'Y', 'ﾖ' => 'Y',
        'ﾗ' => 'R', 'ﾘ' => 'R', 'ﾙ' => 'R', 'ﾚ' => 'R', 'ﾛ' => 'R',
        'ﾜ' => 'W', 'ｲ' => 'I', 'ｴ' => 'E', 'ｦ' => 'O',
        'ｶﾞ' => 'G', 'ｷﾞ' => 'G', 'ｸﾞ' => 'G', 'ｹﾞ' => 'G', 'ｺﾞ' => 'G',
        'ｻﾞ' => 'Z', 'ｼﾞ' => 'J', 'ｽﾞ' => 'Z', 'ｾﾞ' => 'Z', 'ｿﾞ' => 'Z',
        'ﾀﾞ' => 'D', 'ﾁﾞ' => 'J', 'ﾂﾞ' => 'Z', 'ﾃﾞ' => 'D', 'ﾄﾞ' => 'D',
        'ﾊﾞ' => 'B', 'ﾋﾞ' => 'B', 'ﾌﾞ' => 'B', 'ﾍﾞ' => 'B', 'ﾎﾞ' => 'B',
        'ﾊﾟ' => 'P', 'ﾋﾟ' => 'P', 'ﾌﾟ' => 'P', 'ﾍﾟ' => 'P', 'ﾎﾟ' => 'P',
        'ｷｬ' => 'K', 'ｷｭ' => 'K', 'ｷｮ' => 'K',
        'ｼｬ' => 'S', 'ｼｭ' => 'S', 'ｼｮ' => 'S',
        'ﾁｬ' => 'C', 'ﾁｭ' => 'C', 'ﾁｮ' => 'C',
        'ﾆｬ' => 'N', 'ﾆｭ' => 'N', 'ﾆｮ' => 'N',
        'ﾋｬ' => 'H', 'ﾋｭ' => 'H', 'ﾋｮ' => 'H',
        'ﾐｬ' => 'M', 'ﾐｭ' => 'M', 'ﾐｮ' => 'M',
        'ﾘｬ' => 'R', 'ﾘｭ' => 'R', 'ﾘｮ' => 'R',
        'ｷﾞｬ' => 'G', 'ｷﾞｭ' => 'G', 'ｷﾞｮ' => 'G',
        'ｼﾞｬ' => 'J', 'ｼﾞｭ' => 'J', 'ｼﾞｮ' => 'J',
        'ﾋﾞｬ' => 'B', 'ﾋﾞｭ' => 'B', 'ﾋﾞｮ' => 'B',
        'ﾋﾟｬ' => 'P', 'ﾋﾟｭ' => 'P', 'ﾋﾟｮ' => 'P',
    ];


    public const ASSIGNED_PROCESS = [
        'requirement_definition_flag' => '要件定義',
        'basic_design_flag' => '基本設計',
        'detailed_design_flag' => '詳細設計',
        'db_design_flag' => 'DB設計',
        'programming_flag' => 'プログラミング',
        'unit_test_flag' => '単体テスト',
        'integration_test_flag' => '結合テスト',
        'system_test_flag' => '総合テスト',
        'operation_test_flag' => '運用テスト',
        'system_migration_flag' => 'システム移行',
        'operation_maintenance_flag' => '運用・保守'
    ];

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
     * スキルシート初期表示
     *
     * @return void
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $skill_data = User::query()
            ->where('id', $user_id)
            ->with([
                'profile',
                'language',
                'database',
                'framework',
                'middleware',
                'os',
                'server',
                'virtual_environment',
                'version_management',
                'portfolio',
                'qualification',
                'language_proficiency',
            ])
            ->first();
        // dd($skill_data->os);
        $skill_project_data = Project::query()
            ->where('user_id', $user_id)
            ->with([
                'middleware',
                'language',
                'database',
                'framework',
                'os',
                'server',
                'version_management',
                'virtual_environment',
            ])
            ->get();

        $initial_user_name = $this->create_initial($skill_data->first_name_kana,  $skill_data->last_name_kana);

        $user_age = $this->calculateAge($skill_data->profile->birthdate);

        return view('skill_sheet', compact('skill_data', 'user_age', 'initial_user_name', 'skill_project_data'));
    }

    public function user_skill_sheet($id)
    {

        $skill_data = User::query()
            ->where('id', $id)
            ->with([
                'profile',
                'language',
                'database',
                'framework',
                'middleware',
                'os',
                'server',
                'virtual_environment',
                'version_management',
                'portfolio',
                'qualification',
                'language_proficiency',
            ])
            ->first();
        // dd($skill_data);
        $skill_project_data = Project::query()
            ->where('user_id', $id)
            ->with([
                'middleware',
                'language',
                'database',
                'framework',
                'os',
                'server',
                'version_management',
                'virtual_environment',
            ])
            ->get();

        $initial_user_name = $this->create_initial($skill_data->first_name_kana,  $skill_data->last_name_kana);

        $user_age = $this->calculateAge($skill_data->profile->birthdate);

        return view('skill_sheet', compact('skill_data', 'user_age', 'initial_user_name', 'skill_project_data'));
    }



    public function viewPdf(Request $request)
    {
        $data = $request->all();
        //ここでviewに$dataを送っているけど、
        //今回$dataはviewで使わない
        // dd($data);
        $pdf = PDF::loadView('pdf.document', $data);

        return $pdf->stream('document.pdf'); //生成されるファイル名
        // return $pdf->download('document.pdf'); //生成されるファイル名
    }

    public function dlPdf($id)
    {
        $skill_data = User::query()
            ->where('id', $id)
            ->with([
                'profile',
                'language',
                'database',
                'framework',
                'middleware',
                'os',
                'server',
                'virtual_environment',
                'version_management',
                'portfolio',
                'qualification',
                'language_proficiency',
            ])
            ->first();

        $skill_project_data = Project::query()
            ->where('user_id', $id)
            ->with([
                'middleware',
                'language',
                'database',
                'framework',
                'os',
                'server',
                'version_management',
                'virtual_environment',
            ])
            ->orderByRaw('ISNULL(end_date) DESC, end_date DESC')
            ->get();
        $initial_user_name = $this->create_initial($skill_data->first_name_kana,  $skill_data->last_name_kana);

        $user_age = $this->calculateAge($skill_data->profile->birthdate);

        $data = [
            "skill_data" => $skill_data,
            "skill_project_data" => $skill_project_data,
            "initial_user_name" => $initial_user_name,
            "user_age" => $user_age,
        ];
        $pdf = PDF::loadView('pdf.document', $data);
        return $pdf->stream('document.pdf'); //生成されるファイル名
        // return $pdf->download('document.pdf'); //生成されるファイル名
    }

    /**
     * 年齢を誕生日から計算
     *
     * @param [date] $birthdate
     * @return $age 年齢
     */
    public function calculateAge($birthdate)
    {
        $now = Carbon::now();
        $age = $now->diffInYears(Carbon::parse($birthdate));

        return $age;
    }

    //ローマ字を判定する
    function isRomaji($string)
    {
        return preg_match('/^[a-zA-Z]+$/', $string);
    }

    /**
     * 名前のイニシャルをローマ字で作成
     *
     * @param [type] $first_name　名（ひらがなorカタカナorローマ字全角orローマ字半角）
     * @param [type] $last_name　氏（ひらがなorカタカナ）
     * @return void
     */
    public function create_initial($first_name, $last_name)
    {
        $user_first_name_initial = mb_substr($first_name, 0, 1);
        $user_last_name_initial = mb_substr($last_name, 0, 1);
        if ($this->isRomaji($first_name) && $this->isRomaji($first_name)) {
            $first = strtoupper($user_first_name_initial);
            $last = strtoupper($user_last_name_initial);
        } elseif (self::INITIAL_ALPHABET_TABLE[$user_first_name_initial] && self::INITIAL_ALPHABET_TABLE[$user_last_name_initial]) {
            $first = self::INITIAL_ALPHABET_TABLE[$user_first_name_initial];
            $last = self::INITIAL_ALPHABET_TABLE[$user_last_name_initial];
        } else {
            $first = "";
            $last = "";
        }


        return $first . ' ' . $last;
    }
}
