<?php

use App\Models\Task;
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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string(Task::TITLE);
            $table->float(Task::DURATION);
            $table->string(Task::REMARK);
            $table->unsignedBigInteger(Task::PROJECT);
            $table->unsignedBigInteger(Task::CREATED_BY);
            $table->unsignedBigInteger(Task::MODIFY_BY);
            $table->date(Task::CREATED_AT);
            $table->date(Task::UPDATED_AT);
            $table->unsignedBigInteger(Task::STATUS);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
