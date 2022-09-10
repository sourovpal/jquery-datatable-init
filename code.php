<script>

    table.on( 'order.dt search.dt', function () {
        table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
    
    "createdRow": function (row, data, index) {
        var info = table.page.info();
        $('td', row).eq(0).html(index + 1 + info.page * info.length);
    },


</script>









<script type="text/javascript">
 
    //var editor; // use a global for the submit and return data rendering in the examples
 
    $(document).ready(function () {
 
           editor = new $.fn.dataTable.Editor({
                ajax: "/api/StudentImmigrationNotesDT",
                model: "StudentImmigrationNotesModel",
                table: "#ImmigrationNotes",
                fields: [{
                        label: "Advised Date:",
                        name: "imnAdvisingDate",
                        type: "datetime"
                }, {
                        label: "Action Given:",
                        name: "imnAdvisingAction",
                }, {
                        label: "Advise Type:",
                        name: "imnAdvisingType",
               }, {
                        label: "Note:",
                        name: "imnAdvisingNote",
                }, {
                    label: "Source:",
                    name: "imnAdvisingSource",
               }, {
                   label: "School ID:",
                   name: "imnSchoolMasterID",
                }, {
                    label: "Student ID:",
                    name: "imnStudentID",
               }, {
                   label: "Advise ID:",
                   name: "imnAdvisingID",
               }
                ]
 
            });
 
            // setup and establish the DataTable
            $("#ImmigrationNotes").DataTable({
                ajax: "/api/StudentImmigrationNotesDT",
                model: "StudentImmigrationNotesModel",
                // this sets the feedback text
                "oLanguage": {
                    //"sUrl": "media/language/de_DE.txt",
                    "sZeroRecords": "No records match your search criterion.",
                    "sLengthMenu": "Display _MENU_ records per page.",
                    "sInfo": "Displaying _START_ to _END_ of _TOTAL_ records.",
                    "sInfoEmpty": "Showing 0 to 0 of 0 records.",
                    "sInfoFiltered": "(Filtered from _MAX_ total records.)"
                },
                // this is for the copy, export to Excel, Print and PDF
                //dom: '<"top"fil<"toolbar">p>rt<"bottom"Bil>',
                dom: '<"top"<"toolbar">fl>rt<"bottom"Bpi>',
                buttons: [
                    {
                        extend: 'copyHtml5',
                        //ButtonText: 'Copy Page',
                        exportOptions: {
                            rows: ':visible',
                            columns: ':visible'
                        },
                    },
                    {
                        extend: 'csvHtml5',
                        //ButtonText: "Export to CSV",
                        exportOptions: {
                            rows: ':visible',
                            columns: ':visible'
                        },
 
                    },
                    {
                        extend: 'excelHtml5',
                        //ButtonText: "Export to CSV",
                        exportOptions: {
                            rows: ':visible',
                            columns: ':visible'
                        },
                    },
                    {
                        extend: 'pdfHtml5',
                        //ButtonText: "PDF",
                        exportOptions: {
                            rows: ':visible',
                            columns: ':visible'
                        },
                    },
                    {
                        extend: 'print',
                        //ButtonText: "Print",
                        exportOptions: {
                            rows: ':visible',
                            columns: ':visible'
                        },
                    },
                    //'selectedSingle',
                    'selectAll',
                    'selectNone',
                    //'selectRows',
                    //'selectColumns',
                    //'selectCells',
 
                    //// this hides or shows columns
                    //{
                    //    extend: 'collection',
                    //    text: 'Toggle Visibility',
                    //    buttons: [
                    //        {
                    //            text: 'Recalled',
                    //            action: function (e, dt, node, config) {
                    //                dt.column(6).visible(!dt.column(6).visible());
                    //            }
                    //        },
                    //        {
                    //            text: 'Action',
                    //            action: function (e, dt, node, config) {
                    //                dt.column(7).visible(!dt.column(7).visible());
                    //            }
                    //        }
                    //    ]
                    //},
 
                    { extend: "create", editor: editor },
                    { extend: "edit", editor: editor },
                    { extend: "remove", editor: editor }
 
                ],
 
                // default settings
                keys: true,
                info: true,
                sort: true,
                searching: true,
                select: true,
                ordering: true,
                order: [[1, 'asc']],
                scrollY: '50vh',
                scrollX: true,
                scrollCollapse: true,
                bJQueryUI: true,
                sPaginationType: "full_numbers",
                displayStart: 0,
                stateSave: true,
                autoWidth: false,
                paging: true,
                fixedHeader: true,
                fixedColumns: false,
                columnReorder: true,
 
                //columnDefs: [
                //             { width: '20%', targets: 0 }
                //            ],
                lengthMenu: [[1, 5, 10, 25, 50, 100, -1], [1, 5, 10, 25, 50, 100, "All"]],
                iCookieDuration: 60 * 60 * 24, // 1 day keep cookie
            });
 
            // to have a custom toolbar message show
            $("div.toolbar").html('<b>@ViewBag.Title</b>');
 
 
    });
</script>