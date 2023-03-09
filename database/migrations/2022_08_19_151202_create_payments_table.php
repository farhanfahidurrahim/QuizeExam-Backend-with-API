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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->integer("order_id");
            $table->string("name");
            $table->string("email");
            $table->string("number");
            $table->string("address");
            $table->string("payment_type");
            $table->string("trx_id");
            $table->string("amount");
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
        Schema::dropIfExists('payments');
    }
};
