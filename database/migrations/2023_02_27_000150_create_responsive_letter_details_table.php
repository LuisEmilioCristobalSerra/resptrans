<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsiveLetterDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsive_letter_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('responsive_letter_id')->constrained();
            $table->unsignedBigInteger('inventory_item_id');
            $table->integer('quantity');
            $table->foreign('inventory_item_id', 'inventory_item_to_responsive_letter')->references('id')->on('inventories');
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
        Schema::dropIfExists('responsive_letter_details');
    }
}
