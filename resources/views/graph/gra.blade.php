@extends('dashboard')

@section('graph')
<div class="bg-white p-6 rounded-xl shadow grid grid-cols-2 gap-6">

    <!-- Horizontal Bar Chart -->
    <div>
        <canvas id="horizontal" height="300"></canvas>
    </div>

    <!-- Pie Chart -->
    <div style="width:300px; height:300px; margin:auto;">
        <canvas id="pieChart"></canvas>
    </div>

</div>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // PHP → JS
    const sales = {!! json_encode($sales) !!};

    const items = [];
    const amounts = [];

    sales.forEach(sale => {
        items.push(sale.item);
        amounts.push(sale.amount);
    });

    /* =========================
       HORIZONTAL BAR CHART
    ========================== */
    new Chart(document.getElementById('horizontal'), {
        type: 'bar',
        data: {
            labels: items,
            datasets: [{
                label: 'Amount',
                data: amounts,
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderWidth: 1
            }]
        },
        options: {
            indexAxis: 'y',
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Sales Horizontal Bar Chart'
                }
            },
            scales: {
                x: { beginAtZero: true }
            }
        }
    });

    /* =========================
       PIE CHART
    ========================== */
    new Chart(document.getElementById('pieChart'), {
        type: 'pie',
        data: {
            labels: items,
            datasets: [{
                data: amounts,
                backgroundColor: [
                    'rgba(255,99,132,0.7)',
                    'rgba(255,159,64,0.7)',
                    'rgba(255,205,86,0.7)',
                    'rgba(75,192,192,0.7)',
                    'rgba(54,162,235,0.7)'
                ]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                title: {
                    display: true,
                    text: 'Sales Distribution (Pie Chart)'
                }
            }
        }
    });
</script>
@endsection
