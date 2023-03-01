<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsiveLetterDetailItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsive_letter_detail_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('responsive_letter_detail_id');
            $table->foreign('responsive_letter_detail_id', 'responsive_detail_id_to_item_foreign')->references('id')->on('responsive_letter_details');
            $table->string('code');
            $table->string('serial');
            $table->string('oc');
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
        Schema::dropIfExists('responsive_letter_detail_items');
    }
}
