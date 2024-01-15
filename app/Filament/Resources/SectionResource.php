<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SectionResource\Pages;
use App\Filament\Resources\SectionResource\RelationManagers;
use App\Models\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;

class SectionResource extends Resource
{
    protected static ?string $model = Section::class;

    protected static ?string $navigationGroup = 'Catalog';

    public static function getModelLabel(): string
    {
        return __('Section');
    }

    public static function getPluralLabel(): ?string
    {
        return __('Sections');
    }

    public static function getNavigationLabel(): string
    {
        return __('Sections');
    }

    public static function getNavigationGroup(): string
    {
        return __('Catalog');
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::count() > 0 ? 'primary' : 'gray';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                TextInput::make('alias')
                    ->required()
                    ->maxLength(255),
                Select::make('section_id')
                    ->options(Section::all()
                        ->where('section_id', 0)
                        ->sortBy('title')
                        ->pluck('title', 'id'))
                    ->preload()
                    ->searchable(),
                FileUpload::make('image')
                    ->directory('section')
                    ->visibility('public')
                    ->image()
                    ->openable()
                    ->moveFiles()
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        null,
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->columnSpan('full'),
                Textarea::make('preview_text')
                    ->columnSpan('full'),
                TinyEditor::make('detail_text')
                    ->setRelativeUrls(false)
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsDirectory('section')
                    ->fileAttachmentsVisibility('public')
                    ->showMenuBar()
                    ->toolbarSticky(true)
                    ->columnSpan('full')
                    ->minHeight(500)
                    ->maxHeight(500)
                    ->language('ru'),
                TextInput::make('meta_title')
                    ->required()
                    ->maxLength(255)
                    ->columnSpan('full'),
                Textarea::make('meta_description')
                    ->required()
                    ->columnSpan('full'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('#')
                    ->rowIndex(),
                TextColumn::make('title')
                    ->sortable(),
                TextColumn::make('section.title')
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->sortable()
                    ->dateTime('d.m.Y H:i:s'),
                ToggleColumn::make('is_active')
                    ->onColor('success')
                    ->offColor('danger'),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make()->label(''),
                DeleteAction::make()
                    ->requiresConfirmation()
                    ->label(''),
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
            'index' => Pages\ListSections::route('/'),
            'create' => Pages\CreateSection::route('/create'),
            'edit' => Pages\EditSection::route('/{record}/edit'),
        ];
    }
}
