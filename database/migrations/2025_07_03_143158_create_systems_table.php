<?php

use App\Models\System;
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
        if(!Schema::hasTable(System::TABLE)){
            Schema::create(System::TABLE, function (Blueprint $table) {
                $table->id();
                $table->string(System::NAME);
                $table->string(System::PROFILE)->nullable();
                $table->string(System::FAVICON)->nullable();
                $table->timestamps();
            });
        }

        if(Schema::hasTable(System::TABLE)){
            System::create([
               'name' => 'E-Coding',
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(System::TABLE);
    }
};
