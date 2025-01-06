<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PpufResource\Pages;
use App\Filament\Resources\PpufResource\RelationManagers;
use App\Models\Ppuf;
use App\Models\Role;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PpufResource extends Resource
{
    protected static ?string $model = Ppuf::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Select::make('role_id')
                            ->label('User')
                            ->options(Role::query()->get()->map(function ($item) {
                                return [
                                    'id' => $item['id'],
                                    'name' => $item['role']
                                ];
                            }))
                            ->required(),

                        Forms\Components\TextInput::make('ppuf_number')
                            ->label('PPUF Number')
                            ->required(),

                        Forms\Components\TextInput::make('iku')
                            ->label('IKU')
                            ->required(),

                        Forms\Components\Select::make('activity_type')
                            ->label('Activity Type')
                            ->options(Ppuf::$activity_dates)
                            ->required(),

                        Forms\Components\TextInput::make('program_name')
                            ->label('Program Name')
                            ->required(),

                        Forms\Components\Textarea::make('description')
                            ->label('Description')
                            ->required(),

                        Forms\Components\TextInput::make('place')
                            ->label('Place')
                            ->required(),

                        Forms\Components\DatePicker::make('date')
                            ->label('Date')
                            ->required(),

                        Forms\Components\TextInput::make('period')
                            ->label('Period')
                            ->required(),

                        Forms\Components\TextInput::make('budget')
                            ->label('Budget')
                            ->numeric()
                            ->required(),

                        Forms\Components\Textarea::make('detail')
                            ->label('Detail')
                            ->required(),
                    ])
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPpufs::route('/'),
            'create' => Pages\CreatePpuf::route('/create'),
            'edit' => Pages\EditPpuf::route('/{record}/edit'),
        ];
    }
}
