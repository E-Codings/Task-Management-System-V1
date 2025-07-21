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
        Schema::table(Task::TABLE_NAME, function (Blueprint $table) {
            $table->renameColumn('project', 'project_id');
        });
        Schema::table(Task::TABLE_NAME, function (Blueprint $table) {
            $table->renameColumn('status', 'status_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            //
        });
    }
};
