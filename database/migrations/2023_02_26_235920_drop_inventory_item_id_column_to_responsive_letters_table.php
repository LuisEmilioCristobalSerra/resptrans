<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropInventoryItemIdColumnToResponsiveLettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('responsive_letters', function (Blueprint $table) {
            $table->dropForeign('inventory_item_to_responsive_letter');
            $table->dropColumn('inventory_item_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('responsive_letters', function (Blueprint $table) {
            $table->unsignedBigInteger('inventory_item_id');
            $table->foreign('inventory_item_id', 'inventory_item_to_responsive_letter')->references('id')->on('inventories');
        });
    }
}
