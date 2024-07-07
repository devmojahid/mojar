<?php

namespace Modules\Core\Traits;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

trait ResourceController
{
    /**
     * Load Data Table page Index All Data
     */

    public function index(...$params): View
    {
        $this->checkPermission('index', $this->getModel(...$params), ...$params);

        if (method_exists($this, 'getBreadcrumbPrefix')) {
            $this->getBreadcrumbPrefix(...$params);
        }

        return $this->view(
            "{$this->viewPrefix}.index",
            $this->getDataForIndex(...$params)
        );
    }

    /**
     * Create data page
     */

    public function create(...$params): View
    {
        $this->checkPermission('create', $this->getModel(...$params), ...$params);

        $indexRoute = str_replace('.create', '.index', Route::currentRouteName());

        if (method_exists($this, 'getBreadcrumbPrefix')) {
            $this->getBreadcrumbPrefix(...$params);
        }

        $this->addBreadcrumb([
            'title' => $this->getTitle(...$params),
            'url' => route($indexRoute, $params)
        ]);

        $model = $this->makeModel(...$params);

        return $this->view(
            "{$this->viewPrefix}.form",
            array_merge(
                [
                    'title' => 'Create ' . $this->getTitle(...$params),
                    'linkIndex' => action([static::class, 'index'], $params)
                ],
                $this->getDataForForm($model, ...$params)
            )
        );
    }

    /**
     * Edit data page
     */

    public function edit(...$params): View
    {

        $indexParams = $params;
        unset($indexParams[$this->getPathIdIndex($indexParams)]);
        $indexParams = collect($indexParams)->values()->toArray();

        $model = $this->getDetailModel($this->makeModel(...$indexParams), ...$params);
        $indexRoute = str_replace(
            '.edit',
            '.index',
            Route::currentRouteName()
        );


        if (method_exists($this, 'getBreadcrumbPrefix')) {
            $this->getBreadcrumbPrefix(...$params);
        }

        $this->addBreadcrumb(
            [
                'title' => $this->getTitle(...$params),
                'url' => route($indexRoute, $indexParams),
            ]
        );


        $this->checkPermission('edit', $model, ...$params);

        return $this->view(
            $this->viewPrefix . '.form',
            array_merge(
                [
                    'title' => $model->{$model->getFieldName()},
                    'linkIndex' => action([static::class, 'index'], $indexParams)
                ],
                $this->getDataForForm($model, ...$params)
            )
        );
    }

    public function store(Request $request, ...$params): JsonResponse|RedirectResponse
    {
        $this->checkPermission('create', $this->getModel(...$params), ...$params);

        $validator = $this->validator($request->all(), ...$params);

        if (is_array($validator)) {
            $validator = Validator::make($request->all(), $validator);
        }

        $validator->validate();

        $data = $this->parseDataForSave($request->all(), ...$params);

        DB::beginTransaction();

        try {
            $this->beforeStore($request, ...$params);

            $model = $this->makeModel(...$params);

            $slug = $request->input('slug');

            if ($slug && method_exists($model, 'generateSlug')) {
                $data['slug'] = $model->generateSlug($slug);
            }
            $this->beforeSave($data, $model, ...$params);
            $model->fill($data);
            $model->save();

            $this->afterStore($request, $model, ...$params);
            $this->afterSave($data, $model, ...$params);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        if (method_exists($this, 'storeSuccess')) {
            $this->storeSuccess($request, $model, ...$params);
        }

        if (method_exists($this, 'saveSuccess')) {
            $this->saveSuccess($request, $model, ...$params);
        }

        return $this->storeSuccessResponse(
            $model,
            $request,
            ...$params
        );
    }

    public function update(Request $request, ...$params): JsonResponse|RedirectResponse
    {
        $validator = $this->validator($request->all(), ...$params);
        if (is_array($validator)) {
            $validator = Validator::make($request->all(), $validator);
        }

        $validator->validate();
        $data = $this->parseDataForSave($request->all(), ...$params);

        $model = $this->getDetailModel($this->makeModel(...$params), ...$params);
        $this->checkPermission('edit', $model, ...$params);

        DB::beginTransaction();
        try {
            $this->beforeUpdate($request, $model, ...$params);
            $slug = $request->input('slug');
            if ($slug && method_exists($model, 'generateSlug')) {
                $data['slug'] = $model->generateSlug($slug);
            }

            $model->fill($data);
            $this->beforeSave($data, $model, ...$params);
            $model->save();

            $this->afterUpdate($request, $model, ...$params);
            $this->afterSave($data, $model, ...$params);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        if (method_exists($this, 'updateSuccess')) {
            $this->updateSuccess($request, $model, ...$params);
        }

        if (method_exists($this, 'saveSuccess')) {
            $this->saveSuccess($request, $model, ...$params);
        }

        return $this->updateSuccessResponse(
            $model,
            $request,
            ...$params
        );
    }

    public function datatable(Request $request, ...$params): JsonResponse
    {
        $this->checkPermission('index', $this->getModel(...$params), ...$params);

        $table = $this->getDataTable(...$params);
        $table->setCurrentUrl(action([static::class, 'index'], $params, false));
        list($count, $rows) = $table->getData($request);

        $results = [];
        $columns = $table->columns();

        foreach ($rows as $index => $row) {
            $columns['id'] = $row->id;
            foreach ($columns as $key => $column) {
                if (!empty($column['formatter'])) {
                    $formatter = $column['formatter'](
                        $row->{$key} ?? null,
                        $row,
                        $index
                    );

                    if ($formatter instanceof Renderable) {
                        $formatter = $formatter->render();
                    }

                    $results[$index][$key] = $formatter;
                } else {
                    $results[$index][$key] = $row->{$key};
                }

                if (!empty($column['detailFormatter'])) {
                    $results[$index]['detailFormatter'] = $column['detailFormatter'](
                        $index,
                        $row
                    );
                }
            }
        }

        return response()->json([
            'total' => $count,
            'rows'  => $results
        ]);
    }






    protected function beforeStore(Request $request, ...$params)
    {
        //
    }

    protected function afterStore(Request $request, $model, ...$params)
    {
        //
    }

    protected function beforeUpdate(Request $request, $model, ...$params)
    {
        //
    }

    protected function afterUpdate(Request $request, $model, ...$params)
    {
        //
    }

    protected function beforeSave(&$data, &$model, ...$params)
    {
        //
    }

    /**
     * After Save model
     *
     * @param  array  $data
     * @param  \Juzaweb\CMS\Models\Model  $model
     * @param  mixed  $params
     */
    protected function afterSave($data, $model, ...$params)
    {
        //
    }
}