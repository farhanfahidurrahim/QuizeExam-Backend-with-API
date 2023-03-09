<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_mcq_results', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->integer("subject_id");
            $table->integer("topic_id");
            $table->integer("total_correct");
            $table->json("exam_info");
            $table->timestamp("created_at")->useCurrent();
            $table->timestamp("updated_at")->default(\Illuminate\Support\Facades\DB::raw('NULL ON UPDATE CURRENT_TIMESTAMP'))->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_mcq_results');
    }
};
