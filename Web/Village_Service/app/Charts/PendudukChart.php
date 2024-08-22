<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class PendudukChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $pendudukChart = user::get();
        $anak_anak = User::whereBetween('usia', [1, 10])->count();
        $remaja = User::whereBetween('usia', [11, 17])->count();
        $dewasa = User::whereBetween('usia', [18, 30])->count();
        $orang_tua = User::whereBetween('usia', [31, 50])->count();
        $lansia = User::where('usia', '>=', 51)->count();

        $data = [
            'anak_anak' => $anak_anak,
            'remaja' => $remaja,
            'dewasa' => $dewasa,
            'orang_tua' => $orang_tua,
            'lansia' => $lansia,
        ];
        $label[
            'anak-anak'
            'remaja'
            'dewasa'
            'orang-tua'
            'lansia'
        ];
        return $this->chart->pieChart()
            ->setTitle('Data Jumlah Penduduk Ompu Raja Hutapea')
            ->setSubtitle(date('y'))
            ->addData($data)
            ->setLabels($label);
    }
}
