<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Employee as Model;
use App\Models\Company as CompanyModel;


return new class extends Migration {
    /**
     * The name of the user id foreign key.
     *
     * @var string
     */
    private string $companyIdForeignName = Model::TABLE_NAME . '_' . Model::COLUMN_COMPANY_ID . '_foreign';

    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create(Model::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->string(Model::COLUMN_FIRST_NAME);
            $table->string(Model::COLUMN_LAST_NAME);
            $table->unsignedBigInteger(Model::COLUMN_COMPANY_ID);
            $table->string(Model::COLUMN_EMAIL)->unique();
            $table->string(Model::COLUMN_PHONE);
            $table->string(Model::COLUMN_NOTE);
            $table->timestamps();

            $table->foreign(
                Model::COLUMN_COMPANY_ID,
                $this->companyIdForeignName
            )
                ->references('id')
                ->on(CompanyModel::TABLE_NAME)
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::create(Model::TABLE_NAME, function (Blueprint $table) {
            $table->dropForeign($this->companyIdForeignName);
        });

        Schema::dropIfExists(Model::TABLE_NAME);
    }
};
