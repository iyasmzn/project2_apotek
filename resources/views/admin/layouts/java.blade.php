
<script src="/colored/js/jquery2.0.3.min.js"></script>
<script src="/colored/js/modernizr.js"></script>
<script src="/colored/js/jquery.cookie.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<script src="/colored/js/screenfull.js"></script>
        <script>
        $(function () {
    	    $('#myTable').DataTable();
            $('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

            if (!screenfull.enabled) {
                return false;
            }

            

            $('#toggle').click(function () {
                screenfull.toggle($('#container')[0]);
            }); 
        });
        </script>
<script src="/colored/js/bootstrap.js"></script>
<script src="/colored/js/proton.js"></script>
