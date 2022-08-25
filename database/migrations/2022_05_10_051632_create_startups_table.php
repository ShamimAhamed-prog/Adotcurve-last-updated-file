<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStartupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('startups', function (Blueprint $table) {
            $table->id();
            $table->string('s_name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('experienced');
            $table->string('own_portfolio'); 
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('is_startup')->default(1);
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
        Schema::dropIfExists('startups');
    }
}
