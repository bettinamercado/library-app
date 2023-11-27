<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowedEditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrowed_editions', function (Blueprint $table) {
            $table->id();
            $table->uuid('fk_patrons');
            $table->bigInteger('fk_editions');
            $table->timestamp('borrowed_at')
                ->useCurrent();
            $table->timestamp('returned_at')
                ->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('borrowed_editions');
    }
}
