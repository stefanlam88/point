<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCutoffInventory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cutoff_inventories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cutoff_detail_id');
            $table->unsignedInteger('item_id');
            $table->unsignedInteger('warehouse_id');
            $table->unsignedDecimal('quantity', '65', 30);
            $table->string('unit');
            $table->unsignedDecimal('converter', '65', 30);
            $table->unsignedDecimal('price', '65', 30);
            $table->date('expiry_date');
            $table->string('production_number');
            $table->unsignedDecimal('total', '65', 30);
            $table->timestamps();

            $table->foreign('cutoff_detail_id')->references('id')->on('cutoff_details')->onDelete('restrict');
            $table->foreign('item_id')->references('id')->on('items')->onDelete('restrict');
            $table->foreign('warehouse_id')->references('id')->on('warehouses')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_cutoff_inventory');
    }
}
