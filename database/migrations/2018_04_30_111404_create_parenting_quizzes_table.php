<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParentingQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parenting_quizzes', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('question');
            $table->string('optionA');
            $table->string('optionB');
            $table->string('optionC');
            $table->enum('answer', ['A', 'B', 'C']);
            $table->mediumText('tip');
            $table->text('description');
            $table->string('image');
            $table->integer('right')->default(0);   //number of times correctly answered
            $table->integer('wrong')->default(0);   //number of times wrongly answered
            $table->enum('status', ['0', '1'])->default('1')->comment('0: deleted, 1: active');
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
        Schema::dropIfExists('parenting_quizzes');
    }
}
