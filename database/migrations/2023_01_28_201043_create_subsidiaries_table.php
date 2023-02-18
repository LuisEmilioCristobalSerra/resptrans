<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubsidiariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subsidiaries', function (Blueprint $table) {
            $table->id();
            $table->string('name',80);
            $table->text('street',80);
            $table->text('interior',20)->nullable();
            $table->text('exterior',20)->nullable();
            $table->text('district',80);
            $table->text('postalCode',5);
            $table->foreignId('locality_id')->constrained();
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
        Schema::dropIfExists('subsidiaries');
    }
}
