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
        Schema::create('prajurit', function (Blueprint $table) {
            $table->id();
            $table->string('nrp')->unique();
            $table->string('nrpbay');
            $table->string('nama');
            $table->string('pangkat')->nullable();
            $table->string('korps')->nullable();
            $table->string('dinpang')->nullable();
            $table->string('tmt_tni')->nullable();
            $table->string('tmt_fiktif')->nullable();
            $table->string('dinpra')->nullable();
            $table->string('jab')->nullable();
            $table->string('temhir')->nullable();
            $table->date('tglhir')->nullable();
            $table->string('jk')->nullable();
            $table->string('usia')->nullable();
            $table->string('suku')->nullable();
            $table->string('agama')->nullable();
            $table->string('lajab')->nullable();
            $table->text('alamat')->nullable();
            $table->text('dikum')->nullable();
            $table->text('dikmil')->nullable();
            $table->string('bahasing')->nullable();
            $table->string('bahasada')->nullable();
            $table->string('profesi')->nullable();
            $table->string('riwpang')->nullable();
            $table->string('riwjab')->nullable();
            $table->string('tanja')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prajurit');
    }
};
