<?php

namespace App\Models;

use App\Models\Workspace;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;
    protected $table = 'tasks';

    protected $fillable =
    [
        'workspaces_id',
        'name',
        'datetime',
        'status'
    ];

    public function workspace()
    {
        return $this->belongsTo(Workspace::class, 'workspaces_id');
    }
}
