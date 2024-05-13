window.addEventListener('load', function () {
    var url = $('#datatable').attr('data-url');
    var len = sessionStorage.getItem('adminTable_length');
    len = len ? len : 20;
    var table = $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: url.replace(/&amp;/g, '&'),
        lengthChange: true,
        searching: false,
        scrollY: false,
        scrollX: true,
        columns: [
            {
                data: 'id', name: 'id',
                "render": function (data, type, row) {
                    return '<div class="text-right">' + data + '</div>';
                }
            },
            {data: 'name', name: 'name'},
            {data: 'slug', name: 'slug'},
            {data: 'percent', name: 'percent'},
            {data: 'action', name: 'action'}
        ],
        "columnDefs": [
            { "width": "5%", "targets": 0 },
            { "width": "40%", "targets": 1 },
            { "width": "30%", "targets": 2 },
            { "width": "10%", "targets": 3 },
        ],
        "lengthMenu": [[10, 20, 50, 100], [10, 20, 50, 100]],
        "pageLength":len
    });

    $('#datatable').on('length.dt', function(e, settings, len) {
        sessionStorage.setItem('adminTable_length', len);
    });

    if($("div").hasClass('alert')) {
        setTimeout(function(){
            $("div.alert").css("display", "none");
        }, 5000 );
    }
})
