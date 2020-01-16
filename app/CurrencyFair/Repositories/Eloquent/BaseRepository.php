<?php

declare(strict_types=1);

namespace App\CurrencyFair\Repositories\Eloquent;

use App\CurrencyFair\DomainObjects\DomainObjectInterface;
use App\CurrencyFair\Models\BaseModel;
use App\CurrencyFair\Repositories\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection as ModelCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Application;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

abstract class BaseRepository implements RepositoryInterface
{
    /**
     * @var BaseModel|Model|Builder
     */
    protected BaseModel $model;

    /**
     * @var Application
     */
    protected Application $app;

    /**
     * @param Application $application
     */
    public function __construct(Application $application)
    {
        $this->app = $application;
        $this->model = $this->initModel();
    }

    /**
     * Instantiates the model
     *
     * @param string $model
     * @return BaseModel
     */
    protected function initModel(string $model = null): BaseModel
    {
        return $this->app->make($model ?: $this->getModel());
    }

    /**
     * Returns a FQCL of the model
     *
     * @return string
     */
    abstract protected function getModel(): string;

    /**
     * @param array $attributes
     * @return DomainObjectInterface
     */
    public function create(array $attributes): DomainObjectInterface
    {
        $model = $this->model->newInstance($attributes);
        $model->save();
        $this->resetModel();

        return $this->hydrateDomainObjectFromModel($model);
    }

    /**
     * Resets a model to a blank slate
     *
     * @return void
     */
    private function resetModel(): void
    {
        $model = $this->getModel();
        $this->model = new $model();
    }

    /**
     * @param BaseModel $model
     * @return DomainObjectInterface
     */
    private function hydrateDomainObjectFromModel(BaseModel $model): DomainObjectInterface
    {
        $object = $this->getDomainObject();
        $object = new $object();

        foreach ($model->toArray() as $attribute => $value) {
            $method = 'set' . ucfirst(Str::camel($attribute));
            if (is_callable(array($object, $method))) {
                $object->$method($value);
            }
        }

        return $object;
    }

    /**
     * @param array $columns
     * @return Collection
     */
    public function all(array $columns = self::DEFAULT_COLUMNS): Collection
    {
        return $this->hydrateDomainObjectFromCollection($this->model->orderBy('id', 'desc')->get($columns));
    }

    /**
     * @param ModelCollection $collection
     * @return Collection
     */
    private function hydrateDomainObjectFromCollection(ModelCollection $collection): Collection
    {
        return $collection->map(fn ($model) => $this->hydrateDomainObjectFromModel($model));
    }
}
