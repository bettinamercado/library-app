<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEditionsToLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('editions_to_languages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fk_editions');
            $table->bigInteger('fk_languages')
                ->comments('This is for the specific language that edition is in. Some books may have more than one translated version.');
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
        Schema::dropIfExists('editions_to_languages');
    }
}
