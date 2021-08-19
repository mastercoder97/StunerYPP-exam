<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateTblSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_songs', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('song_id');
            $table->string('title')->nullable();
            $table->string('artist')->nullable();
            $table->text('lyrics')->nullable();
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
        Schema::dropIfExists('tbl_songs');
    }
}
