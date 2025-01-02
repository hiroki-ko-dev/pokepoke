<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * マイグレーションの実行
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_exs', function (Blueprint $table) {
            $table->foreignId('id')->constrained('cards')->primary();
            $table->timestamps();
        });
    }

    /**
     * マイグレーションのロールバック
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('card_exs');
    }
};
