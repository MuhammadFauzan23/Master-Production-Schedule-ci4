

  

  
$(function () {
    $("#example1").DataTable({
        'dom': 'Bflrtip',
        "ordering": false,
        "searching": true,
        "lengthMenu": [[-1], ["All"]],
        "info": true,
        "scrollY": 1000,
        "scrollX": 1000,
        "buttons": ["csv", "excel"],
      fixedColumns: {
          left: 2,
          right:1
        }
    });

    $('#example2').DataTable({
        "paging": true,
        // "lengthChange": false,
        // "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        // "responsive": true,
    });

    $('#example3').DataTable({
        "paging": true,
        // "lengthChange": false,
        // "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });

           
    // $('#tableView').DataTable({
    //     'dom': 'Bflrtip',
    //     "ordering": false,
    //     "searching": true,
    //     "lengthMenu": [[-1], ["All"]],
    //     "info": true,
    //     "scrollY": 1000,
    //     "scrollX": 1000,
    //     "buttons": ["csv", "excel"],
    //      fixedColumns: {
    //       left: 3,
    //       right:1
    //     }
        
    // });

      
   

   
    $("#tableViewReport").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  
})
        