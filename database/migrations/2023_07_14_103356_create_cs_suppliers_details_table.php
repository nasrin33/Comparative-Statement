<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCsSuppliersDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cs_suppliers_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cs_id');
            $table->unsignedBigInteger('supplier_id');
            $table->string('selected');
            $table->string('price_colllection_way');
            $table->string('grade');
            $table->string('vat');
            $table->string('tax');
            $table->string('credit_period');
            $table->string('material_availability');
            $table->string('delivery_condition');
            $table->string('required_time');
            $table->string('remarks');

            $table->string('created_by');
            $table->string('updated_by');
            $table->timestamps();

            $table->foreign('cs_id')->references('id')->on('cs')->onDelete('cascade');
            $table->foreign('supplier_id')->references('id')->on('suppliers');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cs_suppliers_details');
    }
}
