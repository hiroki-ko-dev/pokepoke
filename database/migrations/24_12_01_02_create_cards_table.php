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
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('カード名');
            $table->unsignedInteger('pokemon_type_id')->nullable()->comment('タイプ');
            $table->unsignedInteger('card_type_id')->comment('カード種類');
            $table->unsignedInteger('card_rarity_id')->comment('レア度');
            $table->unsignedInteger('card_acquisition_method_id')->comment('入手方法');
            $table->unsignedInteger('pack_id')->comment('パックNo');
            $table->unsignedInteger('number')->comment('カードNo');
            $table->string('image_url')->comment('画像URL');
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
        Schema::dropIfExists('cards');
    }
};
