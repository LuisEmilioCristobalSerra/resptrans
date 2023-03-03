<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information_transfers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transfer_id')->constrained();
            $table->unsignedBigInteger('inventory_item_id');
            $table->foreign('inventory_item_id', 'inventory_item_to_information_transfers')->references('id')->on('inventories');
            $table->integer('quantity');
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
        Schema::dropIfExists('information_transfers');
    }
}
