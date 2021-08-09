<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch', function (Blueprint $table) {
            $table->id();
            $table->string('branch_name');
            $table->string('branch_email');
            $table->string('branch_phone');
            $table->text('branch_address');
            $table->string('branch_city');
            $table->string('branch_state');

            $table->string('branch_country');
            $table->string('branch_pin');
          

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
        Schema::dropIfExists('branches');
    }
}
