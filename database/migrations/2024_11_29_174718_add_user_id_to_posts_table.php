<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // Adiciona a coluna 'user_id', tornando-a opcional e com chave estrangeira
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            // Remove a coluna 'user_id'
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
