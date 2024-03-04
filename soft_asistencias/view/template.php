<?php include ("view/default/header.php"); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
    <div class="container-fluid py-3" style="min-height:800px;"><br />
<?php 
    $mvc = new MvcController();
    $mvc -> enlacesPaginasController();
?>
</div>

<div style="clear:both"></div>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable({
            scrollY: '320px',
            scrollCollapse: true,
            paging: true,

            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } 
        );
    });
</script>

<SCRIPT language=Javascript>
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }

    function ValidAlphabet() {

        var code = (event.which) ? event.which : event.keyCode;

        if ((code >= 65 && code <= 90) ||
            (code >= 97 && code <= 122) || (code == 32)) { return true; }
        else { return false; }
    }
</SCRIPT>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<?php include ("view/default/footer.php") ?>





