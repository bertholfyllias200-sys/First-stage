<div class="bg-white dark:bg-gray-800 rounded shadow p-6 transition" x-init="gsap.from($el, { opacity: 0, y: 30, duration: 0.8 })">
    <h2 class="text-lg font-bold mb-4 text-gray-800 dark:text-white">Graphique des ventes</h2>

    <canvas id="salesChart" class="w-full max-h-[350px]"></canvas>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const ctx = document.getElementById('salesChart').getContext('2d');

                const chart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: @json($labels),
                        datasets: [{
                            label: 'Total ventes (FCFA)',
                            data: @json($data),
                            borderColor: '#4F46E5',
                            backgroundColor: 'rgba(79, 70, 229, 0.2)',
                            fill: true,
                            tension: 0.3,
                            pointRadius: 4,
                            pointBackgroundColor: '#4F46E5',
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                labels: {
                                    color: getComputedStyle(document.documentElement).classList.contains('dark')
                                        ? '#ffffff'
                                        : '#1f2937'
                                }
                            }
                        },
                        scales: {
                            x: {
                                ticks: {
                                    color: getComputedStyle(document.documentElement).classList.contains('dark')
                                        ? '#D1D5DB'
                                        : '#4B5563'
                                }
                            },
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    color: getComputedStyle(document.documentElement).classList.contains('dark')
                                        ? '#D1D5DB'
                                        : '#4B5563'
                                }
                            }
                        }
                    }
                });
            });
        </script>
    @endpush
</div>
