<?php

declare(strict_types=1);

namespace App\Ship\Database;

use Illuminate\Database\Schema\Blueprint as BaseBlueprint;
use Illuminate\Database\Schema\Builder;
use Illuminate\Database\Schema\ColumnDefinition;
use Illuminate\Database\Schema\ForeignIdColumnDefinition;
use Illuminate\Support\Str;
use Override;
use Ship\Parent\Model\Model;

class Blueprint extends BaseBlueprint
{
    /**
     * Add the proper columns for a polymorphic table.
     *
     * @param  string  $name
     * @param  string|null  $indexName
     * @return void
     */
    public function morphs($name, $indexName = null): void
    {
        if ('uuid' === Builder::$defaultMorphKeyType) {
            $this->uuidMorphs($name, $indexName);
        } elseif ('ulid' === Builder::$defaultMorphKeyType) {
            $this->ulidMorphs($name, $indexName);
        } else {
            $this->numericMorphs($name, $indexName);
        }
    }

    /**
     * Add the proper columns for a polymorphic table using numeric IDs (incremental).
     *
     * @param  string  $name
     * @param  string|null  $indexName
     * @return void
     */
    #[Override]
    public function numericMorphs($name, $indexName = null): void
    {
        $this->string("{$name}Type");

        $this->unsignedBigInteger("{$name}Id");

        $this->index(["{$name}Type", "{$name}Id"], $indexName);
    }

    #[Override]
    public function timestamps($precision = 0): void
    {
        $this->timestamp(Model::CREATED_AT, $precision)->useCurrent();

        $this->timestamp(Model::UPDATED_AT, $precision)->useCurrent();
    }

    #[Override]
    public function softDeletes($column = Model::DELETED_AT, $precision = 0): ColumnDefinition
    {
        return $this
            ->timestamp($column, $precision)
            ->index(Str::random(8) . Model::DELETED_AT)
            ->nullable();
    }

    public function causerMorph(null|string $indexName = null): void
    {
        $this->string('causerType');

        $this->unsignedBigInteger('causerId');

        $this->index(['causerId', 'causerType'], $indexName);
    }

    public function personMorph(null|string $indexName = null): void
    {
        $this->string('personType');

        $this->unsignedBigInteger('personId');

        $this->index(['personId', 'personType'], $indexName);
    }

    /**
     * @param string|null $indexName
     * @return void
     */
    public function clientMorph(null|string $indexName = null): void
    {
        $this->string('clientType');

        $this->unsignedBigInteger('clientId');

        $this->index([ 'clientId', 'clientType'], $indexName);
    }

    /**
     * Create a new unsigned big integer (8-byte) column on the table.
     *
     * @param string $column
     * @return ForeignIdColumnDefinition|ColumnDefinition
     */
    public function foreignId($column): ForeignIdColumnDefinition|ColumnDefinition
    {
        return $this->addColumnDefinition(new ForeignIdColumnDefinition($this, [
            'type' => 'integer',
            'name' => $column,
            'autoIncrement' => false,
            'unsigned' => true,
        ]));
    }
}
