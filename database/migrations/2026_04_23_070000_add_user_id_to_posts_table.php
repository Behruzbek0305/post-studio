<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement('ALTER TABLE posts MODIFY COLUMN user_id BIGINT UNSIGNED NULL');

        $firstUserId = DB::table('users')->value('id');
        if ($firstUserId) {
            DB::table('posts')->where('user_id', 0)->update(['user_id' => $firstUserId]);
        }

        Schema::table('posts', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        DB::statement('ALTER TABLE posts MODIFY COLUMN user_id BIGINT UNSIGNED NOT NULL');
    }
};
