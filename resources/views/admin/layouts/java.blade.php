
<script src="/colored/js/jquery2.0.3.min.js"></script>
<script src="/colored/js/modernizr.js"></script>
<script src="/colored/js/jquery.cookie.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script src="/colored/js/screenfull.js"></script>
        <script>
            var check = function() {
              if (document.getElementById('password').value ==
                document.getElementById('confirm_password').value) {
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').innerHTML = 'matching';
              } else {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'not matching';
              }
            }
        $(function () {
    	    $('#myTable').DataTable();
            $('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

            if (!screenfull.enabled) {
                return false;
            }

            

            $('#toggle').click(function () {
                screenfull.toggle($('#container')[0]);
            });
           $(".tag-select").select2({
               tags: true,
           });
        });
        </script>
<script src="/colored/js/bootstrap.js"></script>
<script src="/colored/js/proton.js"></script>
