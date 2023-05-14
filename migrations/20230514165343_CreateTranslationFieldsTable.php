<?php

use Phpmig\Migration\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

class CreateTranslationFieldsTable extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        Capsule::schema()->create('translation_fields', function (Blueprint $table) {
            $table->id();
            $table->foreignId('translation_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('field');
            $table->longText('translate')->nullable();
            $table->timestamps();

            $table->unique(['translation_id', 'field']);
        });
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        Capsule::schema()->dropIfExists('translation_fields');
    }
}
