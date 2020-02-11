<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdaptPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adapt_posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('category')->nullable();
            $table->string('title')->nullable();
            $table->string('image')->nullable();
            $table->string('gender')->nullable();    
            $table->text('address')->nullable();
            $table->text('description')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('adapt_posts');
    }
}
