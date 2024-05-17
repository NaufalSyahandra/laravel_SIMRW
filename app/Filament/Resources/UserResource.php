<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\Pages\CreateUser;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Pages\Page;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationGroup = 'Settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                card::make()
                    ->schema([
                        TextInput::make('name')->required()->maxLength(255),
                        TextInput::make('username')->required()->maxLength(255),
                        TextInput::make('password')->password()
                            ->required(fn (Page $livewire) => ($livewire instanceof CreateUser))
                            ->maxLength(255)
                            ->dehydrateStateUsing(fn($state) => Hash::make($state))
                            ->dehydrated(fn ($state) => filled($state)),
                        Select::make('roles')
                            ->multiple()
                            ->relationship('roles', 'name')->preload(),
                        Select::make('permissions')
                            ->multiple()
                            ->relationship('permissions', 'name')->preload(),
                        TextInput::make('NIK')->required(),
                        TextInput::make('KK')->required(),
                        TextInput::make('nama_depan')->required(),
                        TextInput::make('nama_belakang')->required(),
                        TextInput::make('tempat_lahir')->required(),
                        DatePicker::make('tanggal_lahir')->required(),
                        Select::make('agama')->options([
                            'Islam' => 'Islam',
                            'Kristen' => 'Kristen',
                            'Katolik' => 'Katolik',
                            'Hindu' => 'Hindu',
                            'Budha' => 'Budha',
                            'Konghucu' => 'Konghucu'
                        ]),
                        Select::make('status_perkawinan')->options([
                            'Belum Kawin' => 'Belum Kawin',
                            'Kawin' => 'Kawin',
                            'Cerai Hidup' => 'Cerai Hidup',
                            'Cerai Mati' => 'Cerai Mati',
                            'Kawin Belum Tercatat' => 'Kawin Belum Tercatat',
                        ]),
                        Select::make('status_hubungan')->options([
                            'Kepala Keluarga' => 'Kepala Keluarga',
                            'Istri' => 'Istri',
                            'Anak' => 'Anak',
                        ]),
                        TextInput::make('pekerjaan')->required(),
                        Select::make('tipe warga')->options([
                            'Domisili Lokal' => 'Domisili Lokal',
                            'Non Domisili Lokal' => 'Non Domisili Lokal',
                        ]),
                        Select::make('jenis_kelamin')->options([
                            'Laki-laki' => 'Laki-laki',
                            'Perempuan' => 'Perempuan',
                        ]),
                        Select::make('golongan_darah')->options([
                            'A' => 'A',
                            'B' => 'B',
                            'AB' => 'AB',
                            'O' => 'O',
                        ]),
                        TextInput::make('alamat')->required(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('username')->sortable()->searchable(),
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('NIK')->sortable()->searchable(),
                TextColumn::make('KK')->sortable()->searchable(),
                TextColumn::make('nama_depan')->sortable()->searchable(),
                TextColumn::make('nama_belakang')->sortable()->searchable(),
                TextColumn::make('tempat_lahir')->sortable()->searchable(),
                TextColumn::make('tanggal_lahir')->dateTime('d-M-Y')->sortable()->searchable(),
                TextColumn::make('agama')->sortable()->searchable(),
                TextColumn::make('status_perkawinan')->sortable()->searchable(),
                TextColumn::make('status_hubungan')->sortable()->searchable(),
                TextColumn::make('pekerjaan')->sortable()->searchable(),
                TextColumn::make('tipe_warga')->sortable()->searchable(),
                TextColumn::make('jenis_kelamin')->sortable()->searchable(),
                TextColumn::make('golongan_darah')->sortable()->searchable(),
                TextColumn::make('alamat')->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
