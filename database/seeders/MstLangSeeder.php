<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MstLangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "ABAP", "Ada", "ActionScript", "Ada", "Alice", "AliceML", "ALGOL", "AngelScript", "Apex (Salesforce)", "Assembly言語",
            "ATS", "Babbage", "Ballerina", "C", "C#", "C++", "Chapel", "Ceylon", "Clojure", "COBOL", "COBOL-IT",
            "COOL", "COQ", "Cython", "D", "Dart", "Delphi", "Datalog", "Dylan", "Elixir", "Euphoria",
            "Erlang", "F#", "Factor", "Fant0m", "Fortran", "Forth", "Go", "Groovy", "Haskell", "HTML",
            "Io", "J", "JScript", "Java", "Janus", "JavaScript", "Julia", "K", "Kotlin", "LabVIEW",
            "Lisp", "Lua", "MATLAB", "MAXScript", "MUMPS", "Objective Caml", "Objective-C", "Oz", "Pascal", "Perl",
            "PHP", "PicoLisp", "Pike", "PL/SQL", "Pop11", "PostScript", "PowerShell", "Prolog", "Python", "R",
            "Red", "Ring", "Ruby", "Rust", "Scala", "Scheme", "Scilab", "Scratch", "Shell Script", "Shen",
            "Simula", "Smalltalk", "Swift", "SQL", "Tcl", "TypeScript", "VHDL", "Verilog", "Visual Basic", "XSLT",
            "Zsh"
        ];


        $seed_data_ary = [];
        for($i = 0; $i < count($data); $i++) {
            $ary = [
                "id" => $i + 1,
                "lang" => $data[$i]
            ];
            $seed_data_ary[] = $ary;
        }
        DB::table('mst_langs')->insert($seed_data_ary);
    }
}
