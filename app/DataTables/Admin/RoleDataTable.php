<?php

namespace App\DataTables\Admin;

use App\Models\Role;
use Form;
use Yajra\Datatables\Services\DataTable;

/**
 * Class RoleDataTable
 *
 * @package App\DataTables\Admin
 */
class RoleDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'admin.roles.datatables-actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $roles = Role::query();

        return $this->applyScopes($roles);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->addAction(['width' => '10%'])
                    ->ajax('')
                    ->parameters([
                                     'dom' => 'Bfrtip',
                                     'scrollX' => false,
                                     'buttons' => [
                                         'create',
                                         'print',
                                         'reset',
                                         'reload',
                                         [
                                             'extend'  => 'collection',
                                             'text'    => '<i class="fa fa-download"></i> Export',
                                             'buttons' => [
                                                 'csv',
                                                 'excel',
                                                 'pdf',
                                             ],
                                         ]
                                     ]
                                 ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {
        return [
            'name' => ['name' => 'name', 'data' => 'name'],
            'display_name' => ['name' => 'display_name', 'data' => 'display_name'],
            'description' => ['name' => 'description', 'data' => 'description'],
            'created_at' => ['name' => 'created_at', 'data' => 'created_at'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'roles';
    }
}
