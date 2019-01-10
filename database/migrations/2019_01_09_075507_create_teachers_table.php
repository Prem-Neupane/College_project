<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //not all but some attributes of the data suvh as not null and autoincrement in increments are default:
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id')->notnull()->auto_increment();
            $table->string('address', 100)->notnull();
            $table->string('phone', 15)->notnull();
            $table->mediumtext('qualification')->nullable();
            $table->text('description')->nullable();
            $table->integer('menu_id')->nullable();
            $table->mediumtext('image')->nullable();
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
        Schema::dropIfExists('teachers');
    }
}
