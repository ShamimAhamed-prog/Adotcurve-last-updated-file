<?php

use App\Models\Admin;
use App\Models\Investor;
use App\Models\Startup;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Admin::class)->nullable()->constrained()->onDelete("cascade");
            $table->foreignIdFor(Investor::class)->nullable()->constrained()->onDelete("cascade");
            $table->foreignIdFor(Startup::class)->nullable()->constrained()->onDelete("cascade");
            $table->longText('message');
            $table->boolean('is_seen')->default(0);
            $table->string('sent_by')->nullable();
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
        Schema::dropIfExists('messages');
    }
}
