<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mahasiswa', function(Blueprint $table){
            $table->renameColumn('nama', 'nama_lengkap');
            $table->string('tempat_lahir')->after('nama');
            $table->text('alamat')->after('tanggal_lahir');
            $table->dropColumn('ipk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mahasiswa', function(Blueprint $table){
            $table->renameColumn('nama_lengkap', 'nama');
            $table->dropColumn('tempat_lahir');
            $table->dropColumn('alamat');
            $table->decimal('ipk', 3, 2)->default(1.00);
        });
    }
};
