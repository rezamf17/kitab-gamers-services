<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevelupCharacters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('free-fire-levelup-characters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_character')->constrained('free-fire-characters')->onUpdate('cascade')->onDelete('cascade');
            $table->string('character_name');
            $table->string('level')->nullable();
            $table->string('required_fragments')->nullable();
            $table->string('desc')->nullable();
            $table->string('reward')->nullable();
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
        Schema::dropIfExists('free-fire-levelup-characters');
    }
}
