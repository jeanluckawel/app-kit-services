@extends('layoutsddd.app')

@section('title', 'Perception History - KIT SERVICES')

@section('content')
    <div class="card mb-4">
        <div class="card-header" style="background-color:#FF6600;color:#fff;">
            <h3 class="card-title mb-0">Historique des Perceptions</h3>
        </div>

        <div class="card-body">
            <canvas id="perceptionChart" style="height:400px;"></canvas>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const labels = @json($labels);
            const totals = @json($totals);

            const ctx = document.getElementById('perceptionChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Montant des Perceptions',
                        data: totals,
                        backgroundColor: '#FF6600'
                    }]
                },
                options: {
                    responsive: true,
                    plugins: { legend: { display: false } },
                    scales: { y: { beginAtZero: true } }
                }
            });
        });
    </script>
@endsection
