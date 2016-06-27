/** Permissions modal **/
$(document).on('click', '[data-action="AssignPermission"]', function () {
    var $this = $(this);
    /** get the permissions Model **/
    $.ajax({
        url: '/admin/roles/permissions/get',
        type: 'GET',
        dataType: 'json',
        data: {
            type: $this.data('type'),
            model: $this.data('model')
        },
        beforeSend: function () {
            $this.button('loading');
        },
        success: function (json) {
            $('#Modeltype').val($this.data('type'));
            $('#Modelid').val($this.data('model'));
            $.each(json, function (index, obj) {
                $('#permissionsSelect').append(new Option(obj.display_name, obj.id, true, false));
            });
            $('#permissionsSelect').selectpicker();
            $('#AssignPermissionsForm').attr('action', $this.data('url'));
            $('#permissionsAddModal').modal('show');
        },
        complete: function () {
            $this.button('reset');
        }
    });
});