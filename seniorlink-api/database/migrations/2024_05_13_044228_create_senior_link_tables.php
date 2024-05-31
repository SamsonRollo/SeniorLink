<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Create the database if it doesn't exist
        DB::statement('CREATE DATABASE IF NOT EXISTS senior_link');

        // Switch to the senior_link database
        config(['database.connections.mysql.database' => 'senior_link']);
        
        Schema::connection('mysql')->create('town', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->string('administrator')->nullable(false);
            $table->string('email')->unique()->nullable(false);
            $table->integer('zip_code')->unique()->nullable(false);
            $table->string('password')->nullable(false);
            $table->string('official_seal_path')->nullable();
            $table->timestamps();
        });

        Schema::connection('mysql')->create('admin', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->string('email')->unique()->nullable(false);
            $table->string('password')->nullable(false);
            $table->string('profile_image_path')->nullable(); 
            $table->timestamps();
        });

        Schema::connection('mysql')->create('establishment_type', function (Blueprint $table) {
            $table->id();
            $table->string('type')->unique()->nullable(false);
            $table->timestamps();
        });

        Schema::connection('mysql')->create('establishment', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->string('code')->unique()->nullable(false);
            $table->string('email')->unique()->nullable(false);
            $table->string('bir_id')->nullable(false);
            $table->string('owner_name')->nullable(false);
            $table->string('owner_tin', 12)->nullable(false);
            $table->unsignedBigInteger('establishment_type_id');
            $table->foreign('establishment_type_id')->references('id')->on('establishment_type');
            $table->string('address')->nullable(false);
            $table->string('password')->nullable(false);
            $table->string('logo_path')->nullable();
            $table->timestamps();
        });

        Schema::connection('mysql')->create('teller', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->date('birthdate')->nullable(false);
            $table->string('address')->nullable(false);
            $table->string('tin', 12)->unique()->nullable(false);
            $table->unsignedBigInteger('establishment_id');
            $table->foreign('establishment_id')->references('id')->on('establishment');
            $table->string('profile_image_path')->nullable(); 
            $table->timestamps();
        });

        Schema::connection('mysql')->create('barangay', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->string('administrator')->nullable(false);
            $table->unsignedBigInteger('town_id')->nullable(false);
            $table->foreign('town_id')->references('id')->on('town');
            $table->string('email')->unique()->nullable(false);
            $table->string('password')->nullable(false);
            $table->string('official_seal_path')->nullable();
            $table->timestamps();
        });

        Schema::connection('mysql')->create('senior', function (Blueprint $table) {
            $table->id();
            $table->string('osca_id')->nullable(false);
            $table->string('fname')->nullable(false);
            $table->string('mname');
            $table->string('lname')->nullable(false);
            $table->unsignedBigInteger('barangay_id')->nullable(false);
            $table->foreign('barangay_id')->references('id')->on('barangay');
            $table->date('birthdate')->nullable(false);
            $table->string('contact_number', 11)->nullable(false);
            $table->string('username')->unique()->nullable(false); // in controller, make it non editable field by making format s[zip_code][osca_id]
            $table->string('profile_image_path')->nullable();
            $table->timestamps();
        });

        Schema::connection('mysql')->create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->integer('quantity')->nullable(false);
            $table->decimal('price', 10, 2)->nullable(false); 
            $table->timestamps();
        });

        Schema::connection('mysql')->create('transaction', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('senior_id')->nullable(false);
            $table->foreign('senior_id')->references('id')->on('senior');
            $table->unsignedBigInteger('establishment_id')->nullable(false); 
            $table->foreign('establishment_id')->references('id')->on('establishment');
            $table->date('date')->nullable(false);
            $table->unsignedBigInteger('teller_id')->nullable(false);
            $table->foreign('teller_id')->references('id')->on('teller');
            $table->timestamps();
        });

        Schema::connection('mysql')->create('product_transaction', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('products_id')->nullable(false);
            $table->foreign('products_id')->references('id')->on('products');
            $table->unsignedBigInteger('transaction_id')->nullable(false); 
            $table->foreign('transaction_id')->references('id')->on('transaction');
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        config(['database.connections.mysql.database' => null]);

        Schema::connection('mysql')->dropIfExists('town');
        Schema::connection('mysql')->dropIfExists('admin');
        Schema::connection('mysql')->dropIfExists('establishment_type');
        Schema::connection('mysql')->dropIfExists('establishment');
        Schema::connection('mysql')->dropIfExists('teller');
        Schema::connection('mysql')->dropIfExists('barangay');
        Schema::connection('mysql')->dropIfExists('senior');
        Schema::connection('mysql')->dropIfExists('products');
        Schema::connection('mysql')->dropIfExists('transaction');
        Schema::connection('mysql')->dropIfExists('product_transaction');

        // Drop the senior_link database itself
        DB::statement('DROP DATABASE IF EXISTS senior_link');
    }
};
