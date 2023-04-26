<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place_post', function (Blueprint $table) {
            //student_idとsubject_idを外部キーに設定
            $table->foreignId('post_id')->constrained('posts');   //参照先のテーブル名を
            $table->foreignId('place_id')->constrained('places');    //constrainedに記載
            $table->primary(['post_id', 'place_id']);  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('place_posts');
    }
};
