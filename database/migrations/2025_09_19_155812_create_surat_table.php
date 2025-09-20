<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('surat', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat');
            $table->foreignId('kategori_id')->constrained('kategori');
            $table->string('judul');
            $table->string('file_pdf');
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('surat');
    }
};