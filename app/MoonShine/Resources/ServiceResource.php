<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Service;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Components\Layout\Flex;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Textarea;

/**
 * @extends ModelResource<Service>
 */
class ServiceResource extends ModelResource
{
    protected string $model = Service::class;

    protected string $title = 'Услуги';

    protected string $column = 'name';

    protected bool $detailInModal = true;

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Image::make('Фотография', 'image'),
            Text::make('Название', 'name'),
            Number::make('Цена, р.', 'price'),
        ];
    }

    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function formFields(): iterable
    {
        $item = $this->getItem();

        return [
            Box::make([
                ID::make(),
                Flex::make([
                    Text::make('Название', 'name')
                        ->required(),
                    Number::make('Цена, р.', 'price')
                        ->required(),
                ]),

                Image::make('Фотография', 'image')
                    ->dir('service')
                    ->allowedExtensions(['png', 'jpeg', 'webp', 'jpg'])
                    ->required(empty($item?->image)),

                Textarea::make('Описание', 'description')
                    ->required(),
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
            Text::make('Название', 'name'),
            Number::make('Цена, р.', 'price'),

            Image::make('Фотография', 'image')
                ->dir('service')
                ->allowedExtensions(['png', 'jpeg', 'webp', 'jpg']),

            Textarea::make('Описание', 'description'),
        ];
    }

    /**
     * @param Service $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
