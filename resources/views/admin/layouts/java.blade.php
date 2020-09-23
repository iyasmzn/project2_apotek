
<script src="/colored/js/jquery2.0.3.min.js"></script>
<script src="/colored/js/modernizr.js"></script>
<script src="/colored/js/jquery.cookie.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
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
        var ctx = $('#myChart');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [
                    @foreach($drugs as $drug)
                        '{{ $drug->name }}',
                    @endforeach
                ],
                datasets: [{
                    label: '# of Votes',
                    data: [
                        @foreach($drugs as $drug)
                            {{ $drug->stock }},
                        @endforeach
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        </script>
<script src="/colored/js/bootstrap.js"></script>
<script src="/colored/js/proton.js"></script>
