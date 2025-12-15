<div>
    <livewire:components.header />

    <livewire:components.sidebar />

    <!-- Main Content -->
<main id="main-content" class="pt-16 sm:pt-20 md:pt-24 md:pl-0 lg:pl-64 smooth-transition min-h-screen">
    <div class="px-4 sm:px-6 lg:p-6">
        <!-- Dashboard Page -->
        <div id="dashboard-page" class="page active">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8 mb-8 sm:mb-10 lg:mb-12">
                <div class="bg-white dark:bg-gray-800 p-4 sm:p-6 lg:p-8 rounded-lg sm:rounded-xl lg:rounded-2xl 
                shadow-sm border border-gray-100 dark:border-gray-700 
                smooth-transition">
                    <div class="flex flex-col space-y-2 sm:space-y-3 lg:space-y-4">
                        <h3 class="text-gray-500 dark:text-gray-400 
                        font-semibold text-sm sm:text-base lg:text-lg">Total Visitor</h3>
                        <p class="text-2xl sm:text-3xl lg:text-4xl font-bold text-blue-600 
                        dark:text-blue-400">{{ $totalVisitors }}</p>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 p-4 sm:p-6 lg:p-8 rounded-lg sm:rounded-xl lg:rounded-2xl 
                shadow-sm border border-gray-100 dark:border-gray-700 
                smooth-transition">
                    <div class="flex flex-col space-y-2 sm:space-y-3 lg:space-y-4">
                        <h3 class="text-gray-500 dark:text-gray-400 
                        font-semibold text-sm sm:text-base lg:text-lg">Total User</h3>
                        <p class="text-2xl sm:text-3xl lg:text-4xl font-bold text-blue-600 
                        dark:text-blue-400">{{ $totalUsers }}</p>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 p-4 sm:p-6 lg:p-8 rounded-lg sm:rounded-xl lg:rounded-2xl 
                shadow-sm border border-gray-100 dark:border-gray-700 
                smooth-transition">
                    <div class="flex flex-col space-y-2 sm:space-y-3 lg:space-y-4">
                        <h3 class="text-gray-500 dark:text-gray-400 
                        font-semibold text-sm sm:text-base lg:text-lg">Total Product</h3>
                        <p class="text-2xl sm:text-3xl lg:text-4xl font-bold text-blue-600 
                        dark:text-blue-400">{{ $totalProducts }}</p>
                    </div>
                </div>
            </div>

            <!-- Charts -->
            <div class="grid grid-cols-1 gap-6 sm:gap-8">
                <!-- Visitor Statistics -->
                <div class="bg-white dark:bg-gray-800 p-4 sm:p-6 lg:p-8 rounded-lg sm:rounded-xl lg:rounded-2xl 
                shadow-sm border border-gray-100 dark:border-gray-700 smooth-transition">
                    <div class="flex flex-col space-y-4 sm:space-y-5 lg:space-y-6">
                        <h3 class="text-xl sm:text-2xl font-bold dark:text-white">
                            All Statistics
                        </h3>
                        <div class="w-full" style="min-height: 250px; height: 60vh; max-height: 320px;">
                            <canvas id="visitorChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Other pages would follow the same pattern with proper spacing -->
    </div>
</main>

<style>
    .smooth-transition {
        transition: all 0.3s ease;
    }
    
    /* Responsive chart adjustments */
    @media (max-width: 640px) {
        #visitorChart {
            height: 250px !important;
        }
    }
    
    @media (min-width: 641px) and (max-width: 1024px) {
        #visitorChart {
            height: 300px !important;
        }
    }
    
    @media (min-width: 1025px) {
        #visitorChart {
            height: 320px !important;
        }
    }
</style>

    <script>
        const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 
        'September', 'October', 'November', 'December'];

        const visitorData = @json($visitors);
        const userData = @json($users);
        const productData = @json($products);

        const visitorCtx = document.getElementById('visitorChart').getContext('2d');
        new Chart(visitorCtx, {
            type: 'line',
            data: {
                labels: months,
                datasets: [
                    {
                        label: 'Visitors',
                        data: visitorData,
                        borderColor: '#2563eb',
                        backgroundColor: 'rgba(37, 99, 235, 0.1)',
                        tension: 0.4,
                        fill: true,
                        pointBackgroundColor: '#2563eb',
                        pointBorderColor: '#ffffff',
                        pointBorderWidth: 2,
                        pointRadius: 6,
                        pointHoverRadius: 8
                    },
                    {
                        label: 'Users',
                        data: userData,
                        borderColor: '#10b981',
                        backgroundColor: 'rgba(16, 185, 129, 0.1)',
                        tension: 0.4,
                        fill: true,
                        pointBackgroundColor: '#10b981',
                        pointBorderColor: '#ffffff',
                        pointBorderWidth: 2,
                        pointRadius: 6,
                        pointHoverRadius: 8
                    },
                    {
                        label: 'Products',
                        data: productData,
                        borderColor: '#fbbf24',
                        backgroundColor: 'rgba(251, 191, 36, 0.1)',
                        tension: 0.4,
                        fill: true,
                        pointBackgroundColor: '#fbbf24',
                        pointBorderColor: '#ffffff',
                        pointBorderWidth: 2,
                        pointRadius: 6,
                        pointHoverRadius: 8
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.1)'
                        },
                        ticks: {
                            stepSize: 200,
                            font: {
                                size: 12
                            }
                        }
                    },
                    x: {
                        grid: {
                            color: 'rgba(0, 0, 0, 0.1)'
                        },
                        ticks: {
                            font: {
                                size: 12
                            }
                        }
                    }
                }
            }
        });
    </script>
</div>