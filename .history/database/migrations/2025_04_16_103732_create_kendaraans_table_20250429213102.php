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
                $table->integer('nup');
                $table->enum('jenis_kendaraan', ['roda_dua', 'roda_empat']);
                $table->string('merek_kendaraan', 100);
                $table->string('nomor_polisi', 50);
                $table->string('nomor_rangka', 100);
                $table->string('nomor_mesin', 100);
                $table->year('tahun_pembuatan');
                $table->string('nama_pemilik', 255);
                $table->date('pajak');
                $table->year('stnk');
                $table->enum('status_kendaraan', ['terpakai', 'tidak_terpakai', 'service'])->default('tidak_terpakai');

                // Kolom untuk peminjaman
                $table->string('nama_peminjam', 255)->nullable();
                $table->string('nip', 50)->nullable();
                $table->string('pangkat_gol', 100)->nullable();
                $table->string('jabatan', 255)->nullable();
                $table->string('unit_kerja', 255)->nullable();
                $table->text('alamat')->nullable();
                $table->dateTime('tanggal_pinjam')->nullable();
                $table->dateTime('tanggal_kembali')->nullable();
                $table->enum('status_pinjam', ['dipinjam', 'selesai'])->default('selesai');
                $table->text('keperluan')->nullable();

                $table->timestamps();
                $table->softDeletes();
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
