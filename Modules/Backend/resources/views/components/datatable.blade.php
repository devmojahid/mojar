@php
    $uniqueId = 23121;
    $hasDetailFormater = true;
    $columns = [];
    $perPage = 10;
    $sortName = 'id';
    $key = 'id';
    $escapes = [];
    $dataUrl = 'backend.datatable.data';
    $action_url = 'backend.datatable.action';

    $columns = [
        [
            'label' => 'ID',
            'width' => '3%',
            'sortable' => true,
            'align' => 'left',
        ],
        [
            'label' => 'Name',
            'width' => 'auto',
            'sortable' => true,
            'align' => 'left',
        ],
        [
            'label' => 'Company',
            'width' => 'auto',
            'sortable' => true,
            'align' => 'left',
        ],
        [
            'label' => 'Phone',
            'width' => 'auto',
            'sortable' => true,
            'align' => 'left',
        ],
        [
            'label' => 'Date',
            'width' => 'auto',
            'sortable' => true,
            'align' => 'left',
        ],
        [
            'label' => 'Status',
            'width' => 'auto',
            'sortable' => true,
            'align' => 'left',
        ],
        [
            'label' => 'Amount',
            'width' => 'auto',
            'sortable' => true,
            'align' => 'left',
        ],
        [
            'label' => 'Actions',
            'width' => 'auto',
            'sortable' => false,
            'align' => 'right',
        ],
    ];

@endphp


<div class="row row-deck row-cards">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Invoices</h3>
            </div>
            <div class="card-body border-bottom py-3">
                <div class="d-flex">
                    <div class="text-muted">
                        Show
                        <div class="mx-2 d-inline-block">
                            <input type="text" class="form-control form-control-sm entries-count" value="8"
                                size="3" aria-label="Invoices count">
                        </div>
                        entries
                    </div>
                    <div class="ms-auto text-muted">
                        Search:
                        <div class="ms-2 d-inline-block">
                            <input type="text" class="form-control form-control-sm search"
                                aria-label="Search invoice">
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap datatable mojarTable" id="mojarTable"
                    @if ($hasDetailFormater) data-detaile-view="true"
                     -detaile-formater="detailFormater" @endif>
                    <thead>
                        <tr>
                            <th data-width="3%" data-checkbox="true"></th>
                            @foreach ($columns as $column)
                                {{-- <th data-width="{{ $column['width'] ?? 'auto' }}"
                                    data-align="{{ $column['align'] ?? 'left' }}" data-field="{{ $key }}"
                                    data-sortable="{{ $column['sortable'] ?? true }}"
                                    @if (in_array($key, $escapes)) data-escape="true" @endif>

                                    {{ $column['label'] ?? strtoupper($key) }}
                                </th> --}}
                                <th>
                                    <button class="table-sort" data-field="{{ $key }}"
                                        data-sortable="{{ $column['sortable'] ?? true }}" data-sort="sort-name">
                                        {{ $column['label'] ?? strtoupper($key) }}
                                    </button>
                                </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody class="table-tbody">

                        @for ($i = 0; $i < 10; $i++)
                            <tr>
                                <td>
                                    <input class="form-check-input m-0 align-middle" type="checkbox"
                                        aria-label="Select invoice">
                                </td>
                                <td>
                                    <span>
                                        {{ $i + 1 }}
                                    </span>
                                </td>
                                <td>
                                    <a href="invoice.html" class="text-reset" tabindex="-1">Design
                                        Works {{ $i + 1 }}
                                    </a>
                                </td>
                                <td class="sort-name">
                                    <span class="flag flag-country-us sort-name"></span>
                                    Carlson Limited {{ $i + 1 }}
                                </td>
                                <td>
                                    87956621
                                </td>
                                <td>
                                    15 Dec 2017
                                </td>
                                <td>
                                    <span class="badge bg-success me-1"></span> Paid
                                </td>
                                <td>$887</td>
                                <td class="text-end">
                                    <span class="dropdown">
                                        <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport"
                                            data-bs-toggle="dropdown">Actions</button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">
                                                Action
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                Another action
                                            </a>
                                        </div>
                                    </span>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
            <div class="card-footer d-flex align-items-center">
                <p class="m-0 text-muted">Showing <span>1</span> to <span>8</span> of
                    <span>16</span> entries
                </p>
                <ul class="pagination m-0 ms-auto">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                            <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M15 6l-6 6l6 6" />
                            </svg>
                            prev
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active"><a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            next
                            <!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M9 6l6 6l-6 6" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('base/assets') }}/libs/list.js/dist/list.min.js" defer></script>
<script src="{{ asset('base/assets') }}/js/mojar-datatable.js" defer></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const table = new mojarTable({
            table: "{{ $uniqueId }}",
            page_size: "{{ $perPage }}",
            sort_name: "{{ $sortName }}",
            url: "{!! $dataUrl !!}",
            action_url: "{!! $action_url !!}",
            search: true,
        });
    });
</script>
