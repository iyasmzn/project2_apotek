
<script src="/colored/js/jquery2.0.3.min.js"></script>
<script src="/colored/js/modernizr.js"></script>
<script src="/colored/js/jquery.cookie.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>
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

        // ChartJS
        @php 
            $drugs = DB::table('drugs')->get();
            // dd($drugs);
        @endphp

        var chart = new Chartisan({
            el: '#myChart',
            data: {
                chart: {
                    labels: [
                        @foreach($drugs as $drug)
                            '{{ $drug->name }}',
                        @endforeach
                    ]
                },
                datasets: [
                    {
                        name: '# of Votes',
                        values: [
                            @foreach($drugs as $drug)
                                {{ $drug->stock }},
                            @endforeach
                        ],
                    }
                ]
            },
            hooks: new ChartisanHooks()
                .datasets('pie')
                .pieColors()
        })

        </script>
<script src="/colored/js/bootstrap.js"></script>
<script src="/colored/js/proton.js"></script>
