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
            Schema::create('kendaraans', function (Blueprint $table) {
                $table->id();
                $table->integer('nup')->unique();
                $table->enum('jenis_kendaraan', ['roda_dua', 'roda_empat']);
                $table->string('merek_kendaraan', 100);
                $table->string('nomor_polisi', 50);
                $table->string('nomor_rangka', 100);
                $table->string('nomor_mesin', 100);
                $table->year('tahun_pembuatan');
                $table->string('nama_pemilik', 255);
                $table->string('nama_pemilik');
                $table->date('pajak_jatuh_tempo');
                $table->enum('status_kendaraan', ['terpakai', 'tidak_terpakai', 'service'])->default('tidak_terpakai');
                $table->softDeletes();
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('kendaraans');
        }
    };
