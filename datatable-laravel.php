
var table = $('#datatableinit').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url":'{{route("admin.index")}}',
        },
        "columns": [
            { "data": "name" },
            { "data": "email" },
            { "data": "status" },
            { "data": "action" }
        ],
        lengthChange: true,
        dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        buttons: [
            {
                extend:    'copyHtml5',
                text:      '<i class="feather icon-copy"></i>',
                titleAttr: 'Copy'
            },
            {
                extend:    'excelHtml5',
                text:      '<i class="feather icon-list"></i>',
                titleAttr: 'Excel'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="feather icon-file-text"></i>',
                titleAttr: 'PDF'
            },
            {
                extend:    'print',
                text:      '<i class="feather icon-printer"></i>',
                titleAttr: 'PRINT'
            }
        ],
        language: {
            paginate: {
            next: '<i class="feather icon-arrow-right"></i>', // or '→'
            previous: '<i class="feather icon-arrow-left"></i>' // or '←' 
            }
        },
        
    });
          
          
          
          
          
          
          
          
  $data = Admin::get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);        
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
