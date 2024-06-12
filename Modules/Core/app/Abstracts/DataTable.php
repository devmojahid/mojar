<?php

namespace Modules\Core\Abstracts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

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

    /**
     * Get the data for the datatable
     * 
     * @return array
     */

    public function getData(Request $request): array
    {
        $sort = $request->get('sort', $this->sortName);
        $order = $request->get('order', $this->sortOrder);
        $offset = $request->get('offset', 0);
        $limit = (int) $request->get('limit', $this->perPage);

        $query = $this->query($request->all());
        $count = $query->count();
        $query->orderBy($sort, $order);
        $query->offset($offset);
        $query->limit($limit);
        $data = $query->get();
        return [
            'count' => $count,
            'rows' => $data
        ];
    }

    /**
     * Mount The DataTable converting the peramiters to the array
     * 
     * @param mixed $params [peramiters to mounted]
     * 
     * @return void
     * @throws Exception
     */

    public function mount(...$params)
    {
        $params = $this->paramsToArray($params);

        if (method_exists($this, 'mount')) {
            $this->mount(...$params);
        }
        $this->params = $params;
    }

    /**
     * Render the View of the DataTable
     * 
     * @return View
     */

    public function render(): View
    {

        if (!empty($this->currentUrl)) {
            $this->currentUrl = url()->current();
        }

        return view('backend::components.datatable', $this->getDataRender());
    }

    /**
     * Returns of array or actions
     * 
     * @return array
     */

    public function actions(): array
    {
        return [
            'delete' => trans('delete'),
        ];
    }

    /**
     * bulk actions for the datatable
     *
     * @param [type] $action
     * @param [type] $ids
     */
    public function bulkActions($action, $ids)
    {
        //
    }

    /**
     * Retrive the get for use search field
     * 
     * @return array
     */

    public function searchField(): array
    {
        return [
            'keyword' => [
                'type' => 'text',
                'placeholder' => 'Search...',
                'label' => 'Search'
            ]
        ];
    }

    /**
     * More actions for the datatable
     * 
     * @param mixed $row
     * @return array the array of actions for the datatable
     */

    public function rowActions($row): array
    {
        return [
            'edit' => [
                'label' => 'Edit',
                'url' => $this->currentUrl . '/' . $row->id . '/edit',
            ],
            'delete' => [
                'label' => 'Delete',
                'action' => 'delete',
                'class' => 'text-danger',
            ]
        ];
    }

    /**
     * Generates a formated row actions for the given value , row and index
     * 
     * @param mixed $value [the value of the row]
     * @param mixed $row [the row]
     * @param int $index [the index of the row]
     * 
     * @return string
     */

    public function rowActionsFormatter($value, $row, int $index): string
    {
        return view(
            'backend::components.datatable.datatable_item',
            [
                'actions' => $this->rowActions($row),
                'row' => $row,
                'editUrl' => $this->currentUrl . '/' . $row->id . '/edit',
                'value' => $value,
            ]
        )->render();
    }

    /**
     * Set the data URL 
     * 
     * @param string $url
     * @throws Exception
     * @return void
     */

    public function setDataUrl(string $url): void
    {
        $this->dataUrl = $url;
    }

    /**
     * Set the action URL
     * 
     * @param string $url
     * @throws Exception
     * @return void
     */

    public function setActionUrl(string $url): void
    {
        $this->actionUrl = $url;
    }

    /**
     * Set the current URL
     * 
     * @param string $url
     * @throws Exception
     * @return void
     */

    public function setCurrentUrl(string $url): void
    {
        $this->currentUrl = $url;
    }

    /**
     * Convert object to array
     * 
     * @return array the array of the object
     */

    public function toArray(): array
    {
        $searchFields = collect($this->searchField())->map(
            function ($item, $key) {
                $item['key'] = $key;
                return $item;
            }
        )->values();

        $columns = collect($this->columns())->map(
            function ($item, $key) {
                $item['key'] = $key;
                $item['sortable'] = Arr::get($item, 'sortable', true);
                unset($item['formatter']);

                return $item;
            }
        )->values();

        $actions = collect($this->actions())->map(
            function ($label, $key) {
                $item['key'] = $key;
                $item['label'] = $label;
                return $item;
            }
        )->values();

        return [
            'columns' => $columns,
            'searchFields' => $searchFields,
            'actions' => $actions,
            'params' => $this->params,
            'perPage' => $this->perPage,
            'sortName' => $this->sortName,
            'sortOrder' => $this->sortOrder,
            'dataUrl' => $this->dataUrl,
            'actionUrl' => $this->actionUrl,
            'searchable' => $this->searchable,
            'searchFieldTypes' => $this->searchFieldTypes(),
            'table' => Crypt::encryptString(static::class),
            'uniqueId' => $this->getUniqueId(),
        ];
    }

    /**
     * Get Data Render
     * 
     * @return array the array of the data render containing the data and the array
     */

    protected function getDataRender(): array
    {
        $uniqueId = $this->getUniqueId();
        $searchFields = $this->searchField();

        return [
            'columns' => $this->columns(),
            'actions' => $this->actions(),
            'uniqueId' => $uniqueId,
            'params' => $this->params,
            'searchFields' => $searchFields,
            'perPage' => $this->perPage,
            'sortName' => $this->sortName,
            'sortOrder' => $this->sortOrder,
            'dataUrl' => $this->dataUrl,
            'actionUrl' => $this->actionUrl,
            'escapes' => $this->escapes,
            'searchable' => $this->searchable,
            'searchFieldTypes' => $this->searchFieldTypes(),
            'table' => Crypt::encryptString(static::class),
        ];
    }

    /**
     * Get the unique ID for the datatable
     * 
     * @return string
     */

    protected function getUniqueId(): string
    {
        return 'mojar-table-' . Str::random(10);
    }

    /**
     * Convert the peramiters to the array
     * 
     * @param mixed $params [the peramiters to be converted]
     * @throws \RuntimeException [if the peramiters is not array]
     * @return array
     */

    protected function paramsToArray($params): array
    {
        foreach ($params as $param) {
            if (is_null($param)) {
                continue;
            }

            if (!in_array(gettype($param), ['array', 'string', 'integer'])) {
                throw new \RuntimeException('The peramiters must be an array');
            }
        }

        // return Arr::wrap($params);
        return $params;
    }

    /**
     * Get the search field types
     * 
     * @return array [the array of the search field types]
     */

    protected function searchFieldTypes()
    {
        return [
            'text' => 'text',
            'select' => 'select',
        ];
        // return [
        //     'text' => 'text',
        //     'select' => 'select',
        //     'date' => 'date',
        //     'daterange' => 'daterange',
        //     'time' => 'time',
        //     'timeRange' => 'timeRange',
        //     'number' => 'number',
        //     'numberRange' => 'numberRange',
        //     'select2' => 'select2',
        //     'select2Multiple' => 'select2Multiple',
        //     'select2Ajax' => 'select2Ajax',
        //     'select2AjaxMultiple' => 'select2AjaxMultiple',
        //     'select2Tag' => 'select2Tag',
        //     'select2TagMultiple' => 'select2TagMultiple',
        //     'select2TagAjax' => 'select2TagAjax',
        //     'select2TagAjaxMultiple' => 'select2TagAjaxMultiple',
        //     'checkbox' => 'checkbox',
        //     'radio' => 'radio',
        //     'textarea' => 'textarea',
        //     'password' => 'password',
        //     'email' => 'email',
        //     'url' => 'url',
        //     'file' => 'file',
        //     'image' => 'image',
        //     'color' => 'color',
        //     'hidden' => 'hidden',
        //     'html' => 'html',
        //     'markdown' => 'markdown',
        //     'wysiwyg' => 'wysiwyg',
        //     'json' => 'json',
        //     'array' => 'array',
        //     'object' => 'object',
        //     'collection' => 'collection',
        //     'morphTo' => 'morphTo',
        //     'morphOne' => 'morphOne',
        //     'morphMany' => 'morphMany',
        //     'morphToMany' => 'morphToMany',
        //     'morphedByMany' => 'morphedByMany',
        //     'belongsTo' => 'belongsTo',
        //     'hasOne' => 'hasOne',
        //     'hasMany' => 'hasMany',
        //     'hasManyThrough' => 'hasManyThrough',
        //     'belongsToMany' => 'belongsToMany',
        //     'morphTo' => 'morphTo',
        //     'morphOne' => 'morphOne',
        //     'morphMany' => 'morphMany',
        //     'morphToMany' => 'morphToMany',
        //     'morphedByMany' => 'morphedByMany',
        //     'belongsTo' => 'belongsTo',
        //     'hasOne' => 'hasOne',
        //     'hasMany' => 'hasMany',
        //     'hasManyThrough' => 'hasMany'
        // ];
    }
}
