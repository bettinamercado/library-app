<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('editions', function (Blueprint $table) {
            $table->id();
            $table->json('title')
                ->comment('JSON Keys include: Main and Subtitle. Subtitle should be left out of the payload if there is none.');
            $table->bigInteger('fk_books');
            $table->enum('cover_type', ['casebound', 'paperbound', 'electronic'])
                ->comment('Accepted values: casebound, paperbound, and electronic.');
            $table->smallInteger('word_count')
                ->nullable();
            $table->smallInteger('page_count')
                ->nullable();
            $table->double('height_cm', null, 2)
                ->nullable();
            $table->bigInteger('fk_publishers');
            $table->json('publishing_details')
                ->comment('JSON Keys include: city published (array), copyright years (array), and published years (array).');
            $table->json('additional_notes')
                ->comment('JSON Keys include: edition descriptions, inclusions, and type of work (e.g. Italian political treatise).');
            $table->string('hs_code', 100)
                ->nullable();
            $table->string('lcc_number', 100)
                ->nullable()
                ->comment('Library of Congress Classification Number');
            $table->string('dewey_decimal', 100)
                ->nullable();
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
        Schema::dropIfExists('editions');
    }
}
