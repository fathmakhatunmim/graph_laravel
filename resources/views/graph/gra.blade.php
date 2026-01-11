@extends('dashboard')

@section('graph')
<div class="bg-white p-6 rounded-xl shadow">
    <canvas id="horizontal" width="600" height="400"></canvas>

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Pass PHP collection to JS
        var sales = {!! json_encode($sales) !!};

        const items = [];
        const amounts = [];

        // Extract items and amounts
        sales.forEach(function(sale) {
            items.push(sale.item);
            amounts.push(sale.amount);
        });

        // Create the horizontal bar chart
        const ctx = document.getElementById('horizontal').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',          // normal bar chart
            data: {
                labels: items,    // X-axis labels
                datasets: [{
                    label: 'Amount',
                    data: amounts,
                    backgroundColor: ['rgba(255, 99, 132, 0.1)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255,205,86,0.2)',
                        'rgba(75,192,192,0.2)',
                        'rgba(54,1622,235,0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'y',    // makes it horizontal
                responsive: true,
                plugins: {
                    legend: { display: true, position: 'top' },
                    title: { display: true, text: 'Sales Horizontal Bar Chart' }
                },
                scales: {
                    x: { beginAtZero: true }
                }
            }
        });
    </script>
</div>
@endsection
