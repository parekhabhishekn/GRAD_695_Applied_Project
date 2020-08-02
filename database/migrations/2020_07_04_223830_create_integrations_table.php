<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntegrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('integrations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned(); 
            $table->enum('type', array('Amazon','Google','Microsoft'));
            $table->string('api_key')->unique();
            $table->string('api_secret')->unique();
            $table->timestamps();
            #$table->foreign('user_id')->references('id')->on('users');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade'); 
        }); 

        #Schema::table('integrations', function (Blueprint $table) {
        #});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('integrations');
    }
}
