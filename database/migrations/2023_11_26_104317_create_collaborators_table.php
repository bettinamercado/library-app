<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollaboratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collaborators', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 200)
                ->nullable();
            $table->string('last_name', 200)
                ->nullable();
            $table->string('other_name', 200)
                ->nullable()
                ->comment('This column is for nicknames or clarification of acronyms in the names.');
            $table->string('alias', 200)
                ->nullable()
                ->comment('This is for any alias this work was written under and was later revealed under their real name.');
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
        Schema::dropIfExists('collaborators');
    }
}
