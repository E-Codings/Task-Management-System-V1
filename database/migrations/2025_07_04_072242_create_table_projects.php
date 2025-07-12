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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('modify_by')->nullable();
            $table->text('remark')->nullable();
            $table->timestamps();
            //foreign key
           // If that user is deleted, the related project will also be deleted automatically.
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            //If the user who last modified is deleted, the modify_by field becomes NULL, but the project still stays.
            $table->foreign('modify_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
