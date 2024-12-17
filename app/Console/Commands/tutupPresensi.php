<?php

namespace App\Console\Commands;

use App\Models\Presensi;
use Carbon\Carbon;
use Illuminate\Console\Command;

class tutupPresensi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:tutup-presensi';

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
        $presensiAktif = Presensi::where('status', 1)->get();

        if(!$presensiAktif->isEmpty())
        {
            foreach($presensiAktif as $item)
            {
                $waktuTutup = Carbon::parse($item->waktu_tutup);

                if($waktuTutup < Carbon::now())
                {
                    $item->status = 0;
                    $item->save();
                    $this->info("Presensi dengan ID {$item->id} berhasil dirubah menjadi tidak aktif.");
                }else{
                    $this->info("Presensi dengan ID {$item->id} masih aktif.");
                }
            }
            $this->info("Pengecekan presensi selesai.");
        } else {
            $this->info('Tidak ada presensi aktif.');
        }
    }
}
