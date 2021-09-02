<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // id칼럼 만드는것
            $table->string('title');
            $table->text('content');
            $table->string('image')->nullable();
            // $table->unsignedBigInteger('user_id'); << 참조무결성 안됨
            $table  ->foreignId('user_id')
                    ->constrained()
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            // $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')->references('id')
            // ->on('users')->onDelete('cascade')
            // ->onUpdate('cascade');
            $table->timestamps(); // create_at,update_at

            // $table->timestamp('create_at'); <<create_at만 하고싶을때
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
