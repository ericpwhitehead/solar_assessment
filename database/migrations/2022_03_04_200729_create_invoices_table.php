<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id(); // auto-increment
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->nullable();
            $table->string('invoice_id');
            $table->string('from_street_address')->nullable();
            $table->string('from_city')->nullable();
            $table->string('from_zip')->nullable();
            $table->string('from_country')->nullable();
            $table->string('to_name')->nullable();
            $table->string('to_email')->nullable();
            $table->string('to_street_address')->nullable();
            $table->string('payment_due')->nullable();
            $table->string('to_city')->nullable();
            $table->string('to_zip')->nullable();
            $table->string('to_country')->nullable();
            $table->string('token')->nullable();
            $table->string('issue_date')->nullable();
            $table->string('payment_terms')->nullable();
            $table->string('project_description')->nullable();
            $table->string('item1_name')->nullable();
            $table->string('item1_qty')->nullable();
            $table->string('item1_price')->nullable();
            $table->string('item1_total')->nullable();
            $table->string('item2_name')->nullable();
            $table->string('item2_qty')->nullable();
            $table->string('item2_price')->nullable();
            $table->string('item2_total')->nullable();
            $table->string('item3_name')->nullable();
            $table->string('item3_qty')->nullable();
            $table->string('item3_price')->nullable();
            $table->string('item3_total')->nullable();
            $table->string('status')->nullable();
            $table->timestamps(); //created_at + updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
};
