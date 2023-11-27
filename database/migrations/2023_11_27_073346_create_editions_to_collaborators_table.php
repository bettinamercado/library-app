<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEditionsToCollaboratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('editions_to_collaborators', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('fk_editions');
            $table->bigInteger('fk_collaborators');
            $table->enum('role', ['translator', 'abridger', 'editor']);
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
        Schema::dropIfExists('editions_to_collaborators');
    }
}
