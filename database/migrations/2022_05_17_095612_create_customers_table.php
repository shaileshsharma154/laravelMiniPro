<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('customers', function (Blueprint $table) {
            $table->id('cutomer_id');
            $table->string('name',60)->nullable();
            $table->string('email',100)->nullable();
            $table->enum('gender',["M","F","o"])->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable()->change();
            
            $table->date('dob')->nullable();
            $table->string('password')->nullable();
            $table->boolean('status')->default(1);
            $table->integer('points')->default(0);

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
        Schema::dropIfExists('customers');
    }
}
