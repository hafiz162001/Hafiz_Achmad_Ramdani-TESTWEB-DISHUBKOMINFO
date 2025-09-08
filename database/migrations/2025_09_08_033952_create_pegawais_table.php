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
    Schema::create('pegawais', function (Blueprint $table) {
    $table->id();
    $table->string('nip')->unique();
    $table->string('nama_lengkap');
    $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
    $table->foreignId('jabatan_id')->nullable()->constrained('jabatans')->onDelete('set null');
    $table->foreignId('skpd_id')->nullable()->constrained('skpds')->onDelete('set null');
    $table->foreignId('unit_kerja_id')->nullable()->constrained('unit_kerjas')->onDelete('set null');
    $table->string('nama_golongan')->nullable();
    $table->string('nama_pangkat')->nullable();
    $table->text('alamat_lengkap')->nullable();
    $table->timestamps();
});
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
