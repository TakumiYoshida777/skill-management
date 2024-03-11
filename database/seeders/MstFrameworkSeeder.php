<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MstFrameworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            "Angular", "ASP.NET", "Django", "Express.js", "Flask", "Flutter", "Hibernate", "Laravel",
            "Node.js", "PyTorch", "React", "Ruby on Rails", "Spring", "TensorFlow", "Vue.js", "AngularJS",
            "Bootstrap", "CherryPy", "CodeIgniter", "D3.js", "Ember.js", "FastAPI", "Flask-RESTful", "jQuery",
            "Keras", "Lumen", "Meteor", "Next.js", "Nuxt.js", "Play Framework", "Quarkus", "Redux",
            "Sails.js", "Symfony", "Thymeleaf", "Unity", "Web2py", "Xamarin", "Yii", "Zend Framework",
            "AdonisJS", "Backbone.js", "CakePHP", "Catalyst", "Django REST framework", "Feathers", "Gatsby",
            "Hapi.js", "Ionic", "JHipster", "Koa", "LoopBack", "Mojolicious", "NestJS", "Odoo", "Phoenix",
            "Quasar", "Rails API", "Struts", "TurboGears", "Umbrella", "Vapor", "Wagtail", "Xamarin.Forms",
            "YUI", "Zope", "Aurelia", "Blazor", "CanJS", "Durandal", "Electron", "Grails", "Happi", "Inferno",
            "Jooby", "KeystoneJS", "Lift", "Moleculer", "OpenUI5", "Polymer", "Redux Saga", "Sapper", "Tide",
            "UmiJS", "XState", "Yew", "ZK Framework"
        ];



        $seed_data_ary = [];
        for($i = 0; $i < count($data); $i++) {
            $ary = [
                "id" => $i + 1,
                "name" => $data[$i]
            ];
            $seed_data_ary[] = $ary;
        }
        DB::table('mst_frameworks')->insert($seed_data_ary);
    }
}
