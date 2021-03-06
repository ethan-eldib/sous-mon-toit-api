<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SousMonToitDescribesCustomersTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('describes_customers_types', function(Blueprint $table) {

            $table->foreignId('id_customer_type')->constrained()->references('id')->on('customers_types');
            $table->foreignId('id_customer')->constrained()->references('id')->on('customers');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('describes_customers_types');
    }
}
