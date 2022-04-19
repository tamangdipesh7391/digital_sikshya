<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_contents', function (Blueprint $table) {
            $table->id();
            $table->string('heading')->unique();
            $table->string('title')->unique();
            $table->string('thumbnail');
            $table->string('front_img')->nullable();
            $table->string('back_img')->nullable();
            $table->string('left_img')->nullable();
            $table->string('right_img')->nullable();
            $table->string('top_img')->nullable();
            $table->string('bottom_img')->nullable();
            $table->string('inner_img')->nullable();
            $table->string('meta_description');
            $table->string('description');
            $table->boolean('status')->default(1);
            

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
        Schema::dropIfExists('subject_contents');
    }
}
