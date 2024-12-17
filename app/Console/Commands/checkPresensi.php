<?php

namespace App\Console\Commands;

use App\Models\Presensi;
use App\Models\PresensiRecord;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class checkPresensi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-presensi';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $presensiAktifList = Presensi::where('status', 1)->get();

        if ($presensiAktifList->isEmpty()) {
            $this->info('Tidak ada presensi aktif.');
            return;
        }else{
            foreach ($presensiAktifList as $presensiAktif) {
                $waktuTutup = Carbon::parse($presensiAktif->waktu_tutup);

                if ($waktuTutup > Carbon::now()) {
                    $this->info("Presensi {$presensiAktif->id} belum ditutup, tidak ada record yang dibuat.");
                    continue;
                } else {
                    $muridList = User::role('murid')->get();

                    foreach ($muridList as $murid) {
                        $recordExists = PresensiRecord::where('user_id', $murid->id)
                            ->where('presensi_id', $presensiAktif->id)
                            ->exists();

                        if (!$recordExists) {
                            PresensiRecord::create([
                                'user_id' => $murid->id,
                                'presensi_id' => $presensiAktif->id,
                                'module_id' => $presensiAktif->module_id,
                                'status' => false,
                            ]);

                            $this->info("Presensi record dibuat untuk murid: {$murid->name} pada presensi ID {$presensiAktif->id}");
                        }
                    }
                }
            }
        }

        $this->info('Pengecekan presensi selesai.');
    }
}
