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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap')->nullable();
            $table->string('no_telepon')->nullable();
            $table->enum('jenis_kelamin',['Laki-laki', 'Perempuan'])->nullable();
            $table->text('alamat')->nullable();
            $table->text('bio')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->enum('status_user',['Active','Non_active'])->default('Active');
            $table->string('picture')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};