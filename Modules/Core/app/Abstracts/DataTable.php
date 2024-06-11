<?php

namespace Modules\Core\Abstracts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

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
}
