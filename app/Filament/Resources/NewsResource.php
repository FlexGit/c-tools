<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsResource\Pages;
use App\Filament\Resources\NewsResource\RelationManagers;
use App\Models\News;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    public static function getModelLabel(): string
    {
        return __('OneNews');
    }

    public static function getPluralLabel(): ?string
    {
        return __('News');
    }

    public static function getNavigationLabel(): string
    {
        return __('News');
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
                FileUpload::make('image')
                    ->directory('news')
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
                    ->required()
                    ->columnSpan('full'),
                TinyEditor::make('detail_text')
                    ->setRelativeUrls(false)
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsDirectory('news')
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
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }
}
