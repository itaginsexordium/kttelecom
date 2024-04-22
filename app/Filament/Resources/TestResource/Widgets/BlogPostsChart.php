<?php

namespace App\Filament\Resources\TestResource\Widgets;

use Illuminate\Database\Eloquent\Model;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class BlogPostsChart extends ApexChartWidget
{

    public ?Model $record = null;

    /**
     * Chart Id
     *
     * @var string
     */
    protected static ?string $chartId = 'blogPostsChart';
    protected int | string | array $columnSpan = 'full';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'Потребление';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    protected function getOptions(): array
    {

        $logs = [];
        $payLog = [];
        $lastLog = (int) $this->record->default_log ?? 0;

        if ($this->record) {
            foreach ($this->record->logs as $item) {

                $logs[] = (int)$item->log - $lastLog;
                $lastLog = (int)$item->log;
            }

            foreach ($this->record->paymentTransactions as $item) {
                $payLog[]=$item->quantity;
            }
        }

        $logs  = array_slice($logs, -12);

        return [
            'chart' => [
                'type' => 'area',
                'height' => $this->record ? 180 : 300,
            ],
            'series' => [
                [
                    'name' => "потребление",
                    'data' => $logs,
                ],
                [
                    'name' => "поступления",
                    'data' => $payLog,
                    'color' => 'red'
                ],
            ],
            'xaxis' => [
                'categories' => ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
                'labels' => [
                    'style' => [
                        'fontFamily' => 'inherit',
                    ],
                ],
            ],
            'yaxis' => [
                'labels' => [
                    'style' => [
                        'fontFamily' => 'inherit',
                    ],
                ],
            ],
            'colors' => ['#a3e635'],
            'stroke' => [
                'curve' => 'smooth',
            ],
            'dataLabels' => [
                'enabled' => false,
            ],
        ];
    }
}
