<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::create('contracts_types', function(Blueprint $table) {
            $table->id('id');
            $table->string('contract_type');
            $table->string('template_path');
        });
        
        Schema::create('contracts', function (Blueprint $table) {
            $table->id('id');
            $table->dateTime('created_at');
            $table->dateTime('updated_at')->nullable()->default(NULL);
            $table->dateTime('deleted_at')->nullable()->default(NULL);
            $table->string('folder')->nullable()->default("");
            $table->string('name');
            $table->foreignId('id_staff')->nullable()->references('id')->on('staffs');
            $table->foreignId('id_estate')->nullable()->references('id')->on('estates');
            $table->foreignId('id_customer')->nullable()->references('id')->on('customers');
            $table->foreignId('id_contract_type')->nullable()->references('id')->on('contracts_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
        Schema::dropIfExists('contracts_types');
    }
}
