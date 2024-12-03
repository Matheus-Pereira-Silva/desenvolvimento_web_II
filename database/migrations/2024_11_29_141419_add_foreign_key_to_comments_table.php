<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('comments', function (Blueprint $table) {
        $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('comments', function (Blueprint $table) {
        $table->dropForeign(['post_id']);
    });
}

};
