<?php

use App\Models\Task;
use App\Models\Status;
use App\Models\Project;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table(Task::TABLE_NAME, function (Blueprint $table) {
            $table->foreign(Task::PROJECT)->references(Project::ID)->on(Project::TABLE_NAME)->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign(Task::STATUS)->references(Status::ID)->on(Status::TABLENAME)->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('task', function (Blueprint $table) {
            //
        });
    }
};
