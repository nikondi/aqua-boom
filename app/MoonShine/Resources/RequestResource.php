<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\RequestModel;
use Illuminate\Contracts\Database\Eloquent\Builder;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Laravel\Enums\Action;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Support\ListOf;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\Date;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Phone;
use MoonShine\UI\Fields\Switcher;
use MoonShine\UI\Fields\Text;

/**
 * @extends ModelResource<RequestModel>
 */
class RequestResource extends ModelResource
{
    protected string $model = RequestModel::class;

    protected string $title = 'Заявки';

    protected bool $detailInModal = true;

    protected function activeActions(): ListOf
    {
        return parent::activeActions()
            ->except(Action::CREATE);
    }

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('Имя', 'name'),
            Phone::make('Номер телефона', 'phone'),
            Date::make('Создана', 'created_at')->format('d.m.Y H:i:s')
                ->sortable(),
            Switcher::make('Прочитана', 'status')
                ->updateOnPreview()
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
            Text::make('Имя', 'name'),
            Phone::make('Номер телефона', 'phone'),
            Date::make('Создана', 'created_at')->format('d.m.Y H:i:s')
                ->sortable(),
            Switcher::make('Прочитана', 'status')
                ->updateOnPreview()
        ];
    }

    /**
     * @param RequestModel $item
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
        return parent::getQuery()
            ->orderBy('created_at', 'desc');
    }
}
