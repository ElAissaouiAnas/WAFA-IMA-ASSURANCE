<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Payzone extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payzone_transactions', function (Blueprint $table) {
            // Create a unique identifier for each transaction
            $table->increments('id');
            
            // Internal identifier for referencing purposes (nullable)
            $table->string("transaction_id");
            
            // Transaction ID provided by Payzone
            $table->string("internal_id")->nullable();
            
            // Current state of the transaction (nullable)
            $table->string("state")->nullable();
            
            // Amount involved in the transaction, with precision for currency
            $table->double("amount", 8, 2)->nullable();
            
            // Currency type for the transaction (limited to 5 characters, nullable)
            $table->string("currency", 5)->nullable();
        
            // Timestamp for when the transaction occurred (nullable)
            $table->datetime("timestamp")->nullable();
            
            // Transaction details from payzone server
            $table->text("details")->nullable();
            
            // Product ID associated with the transaction
            $table->integer("product_id");
            
            // Address IP client
            $table->string("address_ip");

            // Additional timestamp field : created_at and updated_at
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
        //
    }
}
