<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.0/css/font-awesome.css">
</head>
<body>
    <br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <table id="example" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                            </tr>                                
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script>

        
        !(function($){
            var data = [
                {
                    name:'Google',
                    email:'google@gmail.com',
                    phone:''
                }
            ]
 
    $('#example').DataTable( {
        dom: 'lBfrtip',
        buttons: [
   {
     titleAttr: 'Download as PDF',
     extend: 'pdfHtml5',
     className: 'custom-btn fa fa-file-o',
     text: ''
   },
   {
     titleAttr: 'Download as Excel',     
     extend: 'excelHtml5',
     className: 'custom-btn fa fa-th-list',
     text: ''
   },
   {
     titleAttr: 'Download as CSV',     
     extend: 'csvHtml5',
     className: 'custom-btn fa fa-file-text-o',
     text: ''
   },
   {
     titleAttr: 'Print',     
     extend: 'print',
     className: 'custom-btn fa fa-print',
     text: ''
   },
   {
     titleAttr: 'Refresh',     
     extend: '',
     className: 'custom-btn fa fa-refresh',
     text: '',
     action: function ( e, dt, node, config ) {
                console.log('e', e);
                    console.log('dt', dt);
                    console.log('node', node);
                    console.log('config', config);
                    
                }
   }
 ]
    } );
                
})(jQuery);
    </script>
</body>
</html>
