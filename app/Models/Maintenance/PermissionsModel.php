<?php

namespace App\Models\Maintenance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionsModel extends Model
{
    use HasFactory;
    protected $table = 'permissions';
    protected $fillable = [
        'create',
        'read',
        'update',
        'delete',
        'rol_id',
        'menu_id'
    ];
}
