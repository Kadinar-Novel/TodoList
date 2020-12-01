<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTodoList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todo_list', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_todo');
            $table->date('date_todo');
            $table->text('desc_todo');
            $table->char('status_todo',1)->default('0')->comment('0=belum dilakukan, 1=sudah dilakukan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todo_list');
    }
}
