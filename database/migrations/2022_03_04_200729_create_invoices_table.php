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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('body');
            $table->string('from_street_address');
            $table->string('from_city');
            $table->string('from_zip');
            $table->string('from_country');
            $table->string('to_name');
            $table->string('to_email');
            $table->string('to_street_address');
            $table->string('to_city');
            $table->string('to_zip');
            $table->string('to_country');
            $table->string('token');
            $table->dateTime('issue_date');
            $table->string('payment_terms');
            $table->string('project_description');
            $table->string('item1_name');
            $table->string('item1_qty');
            $table->string('item1_price');
            $table->string('item1_total');
            $table->string('item2_name');
            $table->string('item2_qty');
            $table->string('item2_price');
            $table->string('item2_total');
            $table->string('item3_name');
            $table->string('item3_qty');
            $table->string('item3_price');
            $table->string('item3_total');
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
