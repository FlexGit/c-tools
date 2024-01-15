<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use App\Models\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationGroup = 'Catalog';

    public static function getModelLabel(): string
    {
        return __('Product');
    }

    public static function getPluralLabel(): ?string
    {
        return __('Products');
    }

    public static function getNavigationLabel(): string
    {
        return __('Products');
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

    /**
     * @param array $sections
     * @param array $sectionTree
     * @param $sectionId
     * @return array
     */
    private static function buildSectionTree(array $sections, array &$sectionTree = [], $sectionId = 0) {
        foreach ($sections as $section) {
            if ($section['section_id'] == $sectionId) {
                $sectionTree[$section['id']] = ($section['section_id'] ? '- ' : '') . $section['title'];
                $childrenTree = self::buildSectionTree($sections, $sectionTree, $section['id']);
            }
        }

        return $sectionTree;
    }

    public static function form(Form $form): Form
    {
        $sections = Section::select('id', 'title', 'section_id')->get()->sortBy('section_id')->sortBy('title')->toArray();
        $sectionTree = self::buildSectionTree($sections);

        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                TextInput::make('alias')
                    ->required()
                    ->maxLength(255),
                FileUpload::make('image')
                    ->directory('product')
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
                Select::make('section_id')
                    ->options($sectionTree)
                    ->searchable()
                    ->preload()
                    ->required(),
                Textarea::make('preview_text')
                    ->columnSpan('full'),
                TinyEditor::make('detail_text')
                    ->setRelativeUrls(false)
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsDirectory('product')
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
        $sections = Section::select('id', 'title', 'section_id')->get()->sortBy('section_id')->sortBy('title')->toArray();
        $sectionTree = self::buildSectionTree($sections);

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
                SelectFilter::make('section_id')
                    ->options($sectionTree)
                    ->searchable()
                    ->preload(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label(''),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
