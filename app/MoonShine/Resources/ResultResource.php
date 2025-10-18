<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Result;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Image;

/**
 * @extends ModelResource<Result>
 */
class ResultResource extends ModelResource
{
    protected string $model = Result::class;

    protected string $title = 'До / после';

    protected bool $detailInModal = true;

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Image::make('До', 'before')
                ->dir('result'),
            Image::make('После', 'after')
                ->dir('result')
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
                Image::make('До', 'before')
                    ->hint('Размер картинки 1200x500px')
                    ->dir('result')
                    ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'webp']),
                Image::make('После', 'after')
                    ->hint('Размер картинки 1200x500px')
                    ->dir('result')
                    ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'webp'])
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
            Image::make('До', 'before')
                ->dir('result'),
            Image::make('После', 'after')
                ->dir('result')
        ];
    }

    /**
     * @param Result $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
