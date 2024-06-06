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
            {
                data: 'code',
                render: function(data, type, row) {
                    return '<div class="copy-code" data-code="' + data + '">' +
                        '<span style="color:white; font-style: italic;">' + data + '</span>' +
                        '<button class="btn-copy" style="color: blue; background-color: white; border: 1px solid blue; margin-left: 5px;">Copy</button>' +
                        '</div>';
                }
            },
            {data: 'credit', name: 'credit'},
            {data: 'created_by', name: 'created_by'},
            {data: 'use_by', name: 'use_by'},
            {data: 'updated_at', name: 'updated_at'},
            {data: 'status', name: 'status'}
        ],
        "columnDefs": [
            {"width": "5%", "targets": 0},
            {"width": "20%", "targets": 1},
            {"width": "10%", "targets": 2},
            {"width": "20%", "targets": 3},
            {"width": "20%", "targets": 4},
            {"width": "20%", "targets": 5},
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

    // Initialize ClipboardJS
    var clipboard = new ClipboardJS('.copy-code', {
        text: function(trigger) {
            return $(trigger).data('code');
        }
    });

    // Handle successful copy event
    clipboard.on('success', function(e) {
        tempAlert('Copied!',1000);
    });

    // Handle failed copy event
    clipboard.on('error', function(e) {
        alert('Copy failed!');
    });

    function tempAlert(msg,duration)
    {
        var el = document.createElement("div");
        el.setAttribute("style","position:absolute;top:40%;left:20%;background-color:black;");
        el.innerHTML = msg;
        setTimeout(function(){
            el.parentNode.removeChild(el);
        },duration);
        document.body.appendChild(el);
    }
})
