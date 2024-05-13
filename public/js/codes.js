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
            {data: 'code', name: 'code'},
            {data: 'credit', name: 'credit'},
            {data: 'created_by', name: 'created_by'},
            {data: 'status', name: 'status'}
        ],
        "columnDefs": [
            { "width": "5%", "targets": 0 },
            { "width": "30%", "targets": 1 },
            { "width": "20%", "targets": 2 },
            { "width": "20%", "targets": 3 },
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

    //Open modal add credit when click class credit
    $(document).on('click', '.credit', function () {
        $('#id-in-modal').val($(this).attr('data-id'));
        $('#model-in-modal').val($(this).attr('data-model'));
        $('#modal-add-credit').modal('show');
    })
    //Submit form add credit
    $(document).on('click', '#btn-add-credit', function () {
        $('#form-add-credit').submit();
    })
})
