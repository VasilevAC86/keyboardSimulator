<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name'); // Название темы
            $table->text('text'); // Текст темы
            $table->integer('admin_id'); // id админа, кто занёс тему в БД
            $table->string('admin_name'); // Имя админа, кто занёс тему в БД
            $table->integer('count')->default(0); // Сколько раз тема была протестирована
            $table->double('speed_avg')->default(0); // Средняя скорость набора 
            $table->double('accuracy_avg')->default(0); // % правильности ввода символов
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topics');
    }
};
