<?php

namespace App\Filament\Resources\PpufResource\Pages;

use App\Filament\Resources\PpufResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPpufs extends ListRecords
{
    protected static string $resource = PpufResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
