<?php

namespace Modules\Core\Abstracts;

use Illuminate\Database\Eloquent\Builder;

abstract class DataTable
{
    /**
     * Number of items per page
     * 
     * @var int
     */

    protected int $perPage = 10;

    /**
     * Name of the attrubute used for sorting
     * 
     * @var string
     */

    protected string $sortName = 'id';

    /**
     * Sorting order [asc or desc]
     * 
     * @var string
     */

    protected string $sortOrder = 'desc';

    /**
     * Additional perramiter 
     * 
     * @var array
     */

    protected array $params = [];

    /**
     * URL for fetiching data
     * 
     * @var string|null
     */

    protected ?string $dataUrl = null;

    /**
     * URL for performing actions
     * 
     * @var string|null
     */

    protected ?string $actionUrl = null;

    /**
     * Array of carecters to escapes
     * 
     * @var array
     */

    protected array $escapes = [];

    /**
     * Flag indecate the searching enable or not
     * 
     * @var bool
     */

    protected bool $searchable = true;

    /**
     * Current URL
     * 
     * @var string|null
     */

    protected ?string $currentUrl = null;

    public static function make(): static
    {
        return app(static::class);
    }

    /**
     * columns of database
     * 
     * @return array
     */

    abstract function columns();

    /**
     * Query data datatable
     * 
     * @param array $data
     * 
     * @return Builder
     */

    abstract function query(array $data);
}