<?php

use App\Console\Commands\checkPresensi;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Schedule::command(checkPresensi::class)->everyMinute();
