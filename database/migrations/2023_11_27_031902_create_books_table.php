<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->json('title')
                ->comment('JSON Keys include: Main and Subtitle. Subtitle should be left out of the payload if there is none.');
            $table->smallInteger('fk_original_languages')
                ->comment('The original language the author wrote the work in.');
            $table->bigInteger('fk_series')
                ->nullable()
                ->comment('If the book is part of a bigger series');
            $table->smallInteger('series_placement')
                ->nullable()
                ->comment('Required if it is a part of a series.');
            $table->string('published_year', 10);
            $table->string('isbn', 20)
                ->nullable();
            $table->json('subject_tracings')
                ->comment('JSON Keys include: Subjects in Arabic Numbers, Authors in Roman Numerals, and Series title in Roman Numerals.');
            $table->longText('summary');
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
        Schema::dropIfExists('books');
    }
}
