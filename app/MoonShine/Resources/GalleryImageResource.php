<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\GalleryImage;
use Illuminate\Contracts\Database\Eloquent\Builder;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Number;

/**
 * @extends ModelResource<GalleryImage>
 */
class GalleryImageResource extends ModelResource
{
    protected string $model = GalleryImage::class;

    protected string $title = 'Галерея';

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make(),
            Number::make('Порядок', 'sort')
                ->sortable(),
            Image::make('Изображение', 'image'),
        ];
    }

    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function formFields(): iterable
    {
        return [
            Box::make([
                ID::make(),
                Number::make('Порядок', 'sort')
                    ->default(0),
                Image::make('Изображение', 'image')
                    ->required()
                    ->dir('gallery')
                    ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'webp']),
            ])
        ];
    }

    /**
     * @return list<FieldContract>
     */
    protected function detailFields(): iterable
    {
        return [
            ID::make(),
            Image::make('Изображение', 'image'),
        ];
    }

    /**
     * @param GalleryImage $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }

    public function getQuery(): Builder
    {
        return parent::getQuery()->orderBy('sort');
    }
}
