<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series', function (Blueprint $table) {
            $table->id();
            $table->string('name', 300);
            $table->bigInteger('fk_parent')
                ->nullable()
                ->comment('This is for situations when a series belongs to another series e.g. Camp Half-Blood Chronicles has the Percy Jackson and the Olympians series under it.');
            $table->smallInteger('series_position')
                ->nullable()
                ->comment('Required if the fk_parent column is filled.');
            $table->timestamp('created_at')
                ->useCurrent();
            $table->timestamp('updated_at')
                ->useCurrent()
                ->useCurrentOnUpdate();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('series');
    }
}
