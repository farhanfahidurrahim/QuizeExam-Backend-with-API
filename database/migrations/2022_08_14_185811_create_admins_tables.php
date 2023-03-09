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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->text("email");
            $table->text("password");
            $table->integer("is_active")->default(1);
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
        Schema::dropIfExists('admins_tables');
    }
};
