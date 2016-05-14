<?php /** @var $pagination \Illuminate\Pagination\LengthAwarePaginator */ ?>
@if(!empty($records) && $records->hasPages())
    <div class="row">
        <div class="col-sm-5">
            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
                {!! trans_choice('admin.pagination.summary', $records->count(), ['count' => $records->count(), 'total' => $records->total()])!!}
            </div>
        </div>
        <div class="col-sm-7">
            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                {!! $records->render() !!}
            </div>
        </div>
    </div>
@endif