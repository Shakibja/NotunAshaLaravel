// jQuery(document).ready(function(){
//     var table = jQuery("#example").DataTable({
//         buttons:["copy","csv","excel","pdf","print"]

//     });
//     table.buttons().container().appendTo("#example_wrapper .col-md-6:eq(0)");
// });

jQuery(document).ready(function() {
    var table = jQuery('#example').DataTable( {
        lengthChange: true,
        buttons: [ 'copy', 'excel', 'pdf', 'csv', 'print' ] //colvis
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );