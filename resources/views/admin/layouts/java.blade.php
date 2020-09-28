
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
    	    $('#latestOrder').DataTable({
                paging: false,
            });
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
            $drugs = DB::table('drugs')->orderBy('sold', 'desc')->paginate(10);
            // dd($drugs);
        @endphp

        var chart = new Chartisan({
            el: '#soldChart',
            data: {
                chart: {
                    labels: [
                        'Users',
                        'Tags',
                        'Drugs',
                        'Orders',
                    ]
                },
                datasets: [
                    {
                        name: '# of Votes',
                        values: [
                            {{ count(DB::table('users')->get()) }},
                            {{ count(DB::table('tags')->get()) }},
                            {{ count(DB::table('drugs')->get()) }},
                            {{ count(DB::table('orders')->get()) }},
                        ],
                    }
                ]
            },
            hooks: new ChartisanHooks()
                .datasets('pie')
                .pieColors()
                .legend({ position: 'left' })
        })
        var chart = new Chartisan({
            el: '#barChart',
            data: {
                chart: {
                    labels: [
                        @foreach($drugs as $drug)
                            '{{ $drug->name }}',
                        @endforeach
                    ]
                },
                datasets: [
                    { name: 'Drug Stock', values: [ @foreach($drugs as $drug) {{ $drug->stock }}, @endforeach ]},
                    { name: 'Drug Sold', values: [ @foreach($drugs as $drug) {{ $drug->sold }}, @endforeach ]},
                ]
            },
            hooks: new ChartisanHooks()
                .datasets('bar')
                .colors()
                .legend({ position: 'top' })
        })

        </script>
<script src="/colored/js/bootstrap.js"></script>
<script src="/colored/js/proton.js"></script>
