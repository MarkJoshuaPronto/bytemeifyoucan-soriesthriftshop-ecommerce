<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('sku')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->double('old_price')->default(0);
            $table->double('price')->default(0);
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->text('additional_information')->nullable();
            $table->text('shipping_returns')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0: active, 1: inactive');
            $table->tinyInteger('is_delete')->default(0)->comment('0: not delete, 1: delete');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamps();

            $table->foreign('brand_id')->references('id')->on('brand');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
