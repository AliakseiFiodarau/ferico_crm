<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Company as Model;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create(Model::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->string(Model::COLUMN_NAME);
            $table->string(Model::COLUMN_PHONE);
            $table->string(Model::COLUMN_EMAIL)->unique();
            $table->string(Model::COLUMN_URL);
            $table->string(Model::COLUMN_LOGO)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists(Model::TABLE_NAME);
    }
};
