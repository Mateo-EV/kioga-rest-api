<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use App\Helpers\QueryHelper;

class MacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerEloquentBuilderMacros();
    }

    protected function registerEloquentBuilderMacros()
    {
        /**
         * Macro to handle cursor pagination with relations.
         *
         * @param array $relations
         * @param int $perPage
         * @return \Illuminate\Pagination\CursorPaginator
         */
        EloquentBuilder::macro("cursorPaginationWith", function (
            array $relations,
            array $select = ["*"],
            array $customSelect = [],
            int $perPage = 10
        ) {
            /** @var \Illuminate\Database\Eloquent\Builder $query */
            $query = $this;

            $query = QueryHelper::buildQueryWithRelations($query, $relations);
            $select = array_merge(
                array_map(
                    fn(
                        string $actual_select
                    ) => "{$query->getModel()->getTable()}.{$actual_select}",
                    $select
                ),
                $customSelect
            );
            $selects = QueryHelper::buildSelects($relations, $select);
            $query->select($selects);

            /** @var CursorPaginator $results */
            $results = $query->cursorPaginate($perPage);

            return $results->setCollection(
                QueryHelper::transformWithRelations(
                    $results->getCollection(),
                    $relations
                )
            );
        });
    }
}
