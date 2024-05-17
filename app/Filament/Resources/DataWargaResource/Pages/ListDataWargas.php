<?php

namespace App\Filament\Resources\DataWargaResource\Pages;

use App\Filament\Resources\DataWargaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDataWargas extends ListRecords
{
    protected static string $resource = DataWargaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
