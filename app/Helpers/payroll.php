<?php
use Carbon\Carbon;

if (!function_exists('payrollPeriod')) {
    function payrollPeriod()
    {
        $today = Carbon::now();

        if ($today->day < 16) {
            // Avant le 16 → période du 16 du mois précédent au 15 du mois courant
            $start = Carbon::create($today->year, $today->month, 16)->subMonth()->format('d F');
            $end   = Carbon::create($today->year, $today->month, 15)->format('d F');
        } else {
            // Après le 16 → période du 16 du mois courant au 15 du mois suivant
            $start = Carbon::create($today->year, $today->month, 16)->format('d F');
            $end   = Carbon::create($today->year, $today->month, 15)->addMonth()->format('d F');
        }

        return [
            'start' => $start,
            'end'   => $end,
        ];
    }
}

if (!function_exists('payrollMonth')) {
    function payrollMonth()
    {
        $today = Carbon::now();

        // Si avant le 16 → mois courant ; sinon → mois suivant
        return $today->day < 16 ? $today->month : $today->copy()->addMonth()->month;
    }
}
