<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\Facades\Schema;

class DropInformationResponsivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('information_responsives');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('information_responsives', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inventory_id')->constrained();
            $table->foreignId('responsive_letter_id')->constrained();
            $table->timestamps();
        });
    }
}
