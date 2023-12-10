<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->string('theme', 100);
            $table->string('content', 700); // tipe varchar dengan batasan 500 karakter
            $table->unsignedBigInteger('user_id'); // Kolom untuk relasi ke tabel users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Tambahkan default dan onUpdate untuk timestamps
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            $table->softDeletes(); // Tambahkan ini untuk soft delete
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
}
