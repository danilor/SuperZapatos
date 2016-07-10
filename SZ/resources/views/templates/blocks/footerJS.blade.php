<script type="text/javascript" src="../js/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/Datatables/datatables.min.js"></script>
<script type="text/javascript" src="../js/jquery.validate.min.js"></script>
<script type="text/javascript" src="../js/jquery.validate.additional-methods.min.js"></script>

<script type="text/javascript">
    $( document ).ready(function() {
        $('.datatable').DataTable({
            "lengthMenu": [[10, 25, 50, 100 , -1], [10, 25, 50, 100, "All"]],
            "autoWidth":true,
            "stateSave":true,
        });
        $(".validateForm").validate();
    });
</script>