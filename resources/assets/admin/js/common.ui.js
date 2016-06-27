// Javascript to enable link to tab
var url = document.location.toString();
if (url.match('#')) {
    $('.nav-tabs a[href=#'+url.split('#')[1]+']').tab('show') ;
}

// Change hash for page-reload
$('.nav-tabs a').on('shown.bs.tab', function (e) {
    window.location.hash = e.target.hash;
});

$('.selectBootstrap').selectpicker({
    noneSelectedText: 'Значение не выбрано'
});

$('.ajax-select-picker').selectpicker({
    liveSearch:true
}).ajaxSelectPicker({
    ajax:{
        type: 'GET'
    },
    preserveSelected: false,
    locale: {
        emptyTitle: ''
    },
    preprocessData: function(data){
        var objects = [];
        if(data.length){
            for(var i = 0; i < data.length; i++){
                var curr = data[i];
                objects.push(
                    {
                        'value': curr.id,
                        'text':  curr.value,
                        'disable': false
                    }
                );
            }
        }
        return objects;
    }
});

$('.datepicker').datepicker({
    format: 'yyyy-mm-dd'
});

$(function() {
    $('.daterange').daterangepicker({
        "showDropdowns": true,
        "timePicker": true,
        "timePicker24Hour": true,
        "timePicker12Hour": false,
        "timePickerIncrement": 30,
        "format": "YYYY-MM-DD HH:mm",
        "separator": " — ",
        "locale": {
            "applyLabel": "ОК",
            "cancelLabel": "Отмена",
            "fromLabel": "Начало",
            "toLabel": "Конец",
            "customRangeLabel": "Custom",
            "daysOfWeek": [
                "Вс",
                "Пн",
                "Вт",
                "Ср",
                "Чт",
                "Пт",
                "Сб"
            ],
            "monthNames": [
                "Январь",
                "Февраль",
                "Март",
                "Апрель",
                "Май",
                "Июнь",
                "Июль",
                "Август",
                "Сентябрь",
                "Октябрь",
                "Ноябрь",
                "Декабрь"
            ],
            "firstDay": 1
        },
        "opens": "left",
        "drops": "up",
        "buttonClasses": "btn btn-sm",
        "applyClass": "btn-success",
        "cancelClass": "btn-default"
    }, function(start, end, label) {
        console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
    });
});

$(document).on('click', '.confirm', function (e) {
    e.preventDefault();
    var $this = $(this);
    bootbox.dialog({
        message: $this.data('message') || "Are you sure you want to delete this?",
        title: $this.data('title') || "Remove element",
        buttons: {
            success: {
                label: $this.data('success') || "Yes",
                className: "btn-success",
                callback: function () {
                    window.location.href = $this.attr('href');
                }
            },
            danger: {
                label: $this.data('danger') || "No",
                className: "btn-danger",
                callback: function () {

                }
            }
        }
    });
});