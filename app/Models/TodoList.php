<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    protected $table = 'todo_list';

	protected $fillable = [
        'name_todo',
        'date_todo',
        'desc_todo',
        'status_todo'
    ];
}