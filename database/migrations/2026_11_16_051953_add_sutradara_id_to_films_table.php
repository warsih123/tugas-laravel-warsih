
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('films', function (Blueprint $table) {
            $table->foreignId('sutradara_id')
                  ->nullable()
                  ->after('id')
                  ->constrained('sutradaras')
                  ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('films', function (Blueprint $table) {
            $table->dropForeign(['sutradara_id']);
            $table->dropColumn('sutradara_id');
        });
    }
};
