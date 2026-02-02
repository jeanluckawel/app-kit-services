@extends('layoutsddd.app')

@section('title', 'Perception History - KIT SERVICES')

@section('content')
    <div class="card mb-4 m-5">
        <div class="card-header" style="background-color:#FF6600;color:#fff;">
            <h3 class="card-title mb-0">Perception History</h3>
        </div>
        <div class="card-body">
            <canvas id="perceptionChart" style="height: 400px;"></canvas>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('perceptionChart').getContext('2d');
        const perceptionChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($labels),
                datasets: [{
                    label: 'Total Perception',
                    data: @json($totals),
                    backgroundColor: '#FF6600'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false },
                    tooltip: { enabled: true }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) { return value.toLocaleString(); }
                        }
                    }
                }
            }
        });
    </script>
@endsection
