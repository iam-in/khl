<?php

use Phpmig\Migration\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

class CreateTranslationsTable extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        Capsule::schema()->create('translations', function (Blueprint $table) {
            $table->id();
            $table->string('language')->index();
            $table->string('translatable_type')->index();
            $table->unsignedBigInteger('translatable_id')->index();
            $table->timestamps();

            $table->unique(['translatable_id', 'translatable_type', 'language']);
            $table->index(['translatable_type', 'translatable_id'], 'by_informable_type_id');
            $table->index(['language', 'translatable_type', 'translatable_id'], 'language_translatable_type_id');
        });
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        Capsule::schema()->dropIfExists('translations');
    }
}
