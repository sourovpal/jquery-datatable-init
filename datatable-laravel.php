
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
          
          
          
          
var datatableinit = $('#datatableinit').DataTable( {
        "processing": false,
        "serverSide": true,
        "ajax": {
            "url":'{{route("admin.index")}}',
        },
        "columns": [
            { "data": "checkbox", orderable: false, searchable: false },
            { "data": "DT_RowIndex", orderable: false, searchable: false },
            { "data": "name" },
            { "data": "email" },
            { "data": "phone", visible: false },
            { "data": "role", visible: false },
            { "data": "status" },
            { "data": "action", orderable: false, searchable: false }
        ],
        searching:true,
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
                
                
                
    $model = Admin::query();
        return DataTables::eloquent($model)
                ->whitelist(['name', 'email', 'phone', 'role'])
                ->order(function ($query) {
                    $query->orderBy('id', 'desc');
                })
                ->filterColumn('name', function($query, $keyword) {
                    $query->whereRaw('name like ?', ["%{$keyword}%"]);
                })
                ->filterColumn('email', function($query, $keyword) {
                    $query->whereRaw('email like ?', ["%{$keyword}%"]);
                })
                ->filterColumn('phone', function($query, $keyword) {
                    $query->whereRaw('phone like ?', ["%{$keyword}%"]);
                })
                ->filterColumn('role', function($query, $keyword) {
                    $query->whereRaw('role like ?', ["%{$keyword}%"]);
                })
                ->addIndexColumn()
                ->addColumn('checkbox', function($row){
                    return '<input type="checkbox" value="'.$row['id'].'">';
                })
                ->addColumn('name', function($row){
                    return '
                        <div class="d-flex justify-content-start align-items-center">
                            <img class="rounded-circle" style="width:40px;" src="'.asset('assets/images/user/avatar-1.jpg').'" alt="activity-user">
                            <div>
                                <span class="ml-3 d-block">'.ucfirst($row['name']).'</span>
                                <span class="ml-3 d-block text-c-green" style="font-size: 13px;">'.ucfirst($row['role']).'</span>
                            </div>
                        </div>';
                })
                ->addColumn('email', function($row){
                    return '
                        <h6 class="mb-1">'.$row['email'].'</h6>
                        <p class="m-0">'.$row['phone'].'</p>
                    ';
                })
                ->addColumn('status', function($row){
                    if($row["status"] == 1){
                        return '<h6 class="text-muted"><i class="fas fa-circle text-c-green f-10 m-r-15"></i>Active</h6>';
                    }else{
                        return '<h6 class="text-muted"><i class="fas fa-circle text-c-red f-10 m-r-15"></i>Inactive</h6>';
                    }
                })
                ->addColumn('action', function($row){
                    return '
                        <a href="#!" class="label theme-bg2 text-white f-12 py-2 rounded" title="Edit">
                            <i class="feather icon-edit"></i>
                        </a>
                        <a href="#!" class="label theme-bg text-white f-12 py-2 rounded" title="Delete">
                            <i class="feather icon-trash"></i>
                        </a>
                    ';
                })
                ->rawColumns(['checkbox', 'name', 'email', 'status', 'action'])
                ->make(true);            
                
                
    
                
                
                ->orderColumn('name', function ($query, $order) {
                        $query->orderBy('name', $order);
                })
                ->orderColumn('email', function ($query, $order) {
                        $query->orderBy('email', $order);
                })
                
                
                
                ->order(function ($query) {
                    if(array_key_exists(is_array(request()->order)?request()->order[0]['column']:'', [2=>'name', 3=>'email'])){
                        $query->orderBy('id', request()->order[0]['dir']);
                    }else{
                        $query->orderBy('id', 'desc');
                    }
                })
                
                
                
                
                
                
                
                
                
                
                
                
                
          
          
          
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>
          
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap4.min.css">         
          
          
          
          
          
          
