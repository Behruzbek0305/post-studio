<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. PostgreSQL va MySQL-ga mos keladigan tarzda ustunni o'zgartirish
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->change();
        });

        // 2. Birinchi foydalanuvchini olish va posts jadvalini yangilash
        $firstUserId = DB::table('users')->value('id');
        if ($firstUserId) {
            DB::table('posts')->where('user_id', 0)->orWhereNull('user_id')->update(['user_id' => $firstUserId]);
        }

        // 3. Foreign key qo'shish
        Schema::table('posts', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable(false)->change();
        });
    }
};