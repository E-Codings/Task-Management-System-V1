<?php

use App\Models\Status;
use App\Models\User;
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
        Schema::create(Status::TABLENAME, function (Blueprint $table) {
            $table->id(Status::ID); // Primary Key: id
            $table->string(Status::NAME); // name
            $table->unsignedBigInteger(Status::CREATED_BY); // FK: created_by
            $table->unsignedBigInteger(Status::MODIFY_BY);  // FK: modify_by
            $table->text(Status::REMARK)->nullable();  // Remark
            $table->timestamp(Status::CREATED_AT)->nullable();
            $table->timestamp(Status::UPDATED_AT)->nullable();

            // Foreign keys
            $table->foreign(Status::CREATED_BY)->references(User::ID)->on(User::TABLE_NAME);
            $table->foreign(Status::MODIFY_BY)->references(User::ID)->on(User::TABLE_NAME);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Status::TABLENAME);
    }
};