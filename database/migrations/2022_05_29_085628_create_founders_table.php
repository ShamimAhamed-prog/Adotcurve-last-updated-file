<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoundersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('founders', function (Blueprint $table) {
            $table->id();
            $table->string('f_name');
            $table->string('email')->unique();
            $table->string('linkedin')->unique();
            $table->string('phone');
            $table->string('experienced');
            $table->string('own_portfolio'); 
            $table->timestamp('email_verified_at')->nullable();
            $table->string('company_name');
            $table->string('company_website');
            $table->string('company_portfolio');
            $table->string('address');
            $table->string('photo')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('founders');
    }
}
