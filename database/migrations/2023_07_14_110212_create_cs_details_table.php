<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cs_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cs_id');
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('material_id');

            $table->string('rate');

            $table->string('created_by');
            $table->string('updated_by');

            $table->timestamps();

            $table->foreign('cs_id')->references('id')->on('cs')->onDelete('cascade');
            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->foreign('material_id')->references('id')->on('materials');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cs_details');
    }
}
