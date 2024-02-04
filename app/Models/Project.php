<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'start_date',
        'end_date',
        'team_size',
        'all_team_size',
        'position',
        'requirement_definition_flag',
        'basic_design_flag',
        'detailed_design_flag',
        'db_design_flag',
        'programming_flag',
        'unit_testing_flag',
        'integration_testing_flag',
        'system_testing_flag',
        'operation_testing_flag',
        'system_migration_flag',
        'operation_maintenance_flag',
    ];
}
