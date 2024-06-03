<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Builder;

class QueryHelper
{
    public static function buildQueryWithRelations(
        Builder $query,
        array $relations
    ) {
        foreach ($relations as $relation) {
            $table = $relation["table"];
            $foreignKey = $relation["foreignKey"] ?? "{$relation["name"]}_id";
            $localKey = $relation["localKey"] ?? "id";

            $query->join(
                $table,
                "{$table}.{$localKey}",
                "=",
                "{$query->getModel()->getTable()}.{$foreignKey}"
            );
        }

        return $query;
    }

    public static function buildSelects(
        array $relations,
        array $mainTableFields
    ) {
        $selects = $mainTableFields;
        foreach ($relations as $relation) {
            $relationName = $relation["name"];
            $relationProperties = $relation["properties"];

            foreach ($relationProperties as $property) {
                $selects[] = "{$relation["table"]}.{$property} as {$relationName}_{$property}";
            }
        }
        return $selects;
    }

    public static function transformWithRelations($items, $relations)
    {
        return $items->map(function ($item) use ($relations) {
            foreach ($relations as $relation) {
                $relationName = $relation["name"];
                $relationProperties = $relation["properties"];

                $nested = [];
                foreach ($relationProperties as $property) {
                    $nested[$property] =
                        $item->{$relationName . "_" . $property};
                    unset($item->{$relationName . "_" . $property});
                }
                $item->{$relationName} = $nested;
            }
            return $item;
        });
    }
}
