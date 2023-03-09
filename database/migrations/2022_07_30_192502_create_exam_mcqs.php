<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use  \Illuminate\Support\Facades\DB;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_mcqs', function (Blueprint $table) {
            $table->id();
            $table->integer("subject_id");
            $table->integer("topic_id");
            $table->text("question");
            $table->text("option1");
            $table->text("option2");
            $table->text("option3");
            $table->text("option4");
            $table->text("correct_ans");
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('NULL ON UPDATE CURRENT_TIMESTAMP'))->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_mcqs');
    }
};
