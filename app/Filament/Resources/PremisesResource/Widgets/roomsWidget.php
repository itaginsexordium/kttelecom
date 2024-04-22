<?php

namespace App\Filament\Resources\PremisesResource\Widgets;

use App\Models\Premises;
use Carbon\Carbon;
use Filament\Widgets\Concerns\CanPoll;
use Filament\Widgets\Widget;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class roomsWidget extends Widget
{
    use CanPoll;

    protected static string $view = 'filament.resources.premises-resource.widgets.rooms-widget';

    protected int | string | array $columnSpan = 'full';

    public  $data = [];

    public array $excludes = [];

    public array $includes = [];

    public array $grid = [];

    public array $icons = [];

    protected static bool $isLazy = true;

    public function getData()
    {
        $roomsData = Premises::all();

        return $roomsData;
    }

    public function mount(): void
    {
        $this->data = $this->getData();
    }

}
