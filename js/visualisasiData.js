
// fetch the service revenue data from the server
function fetchServiceRevenueData() {
    return fetch('fetch_service_revenue.php')
        .then(response => response.json())
        .then(data => data)
        .catch(error => console.error('Error:', error));
}

// update the service revenue chart with the fetched data
async function updateServiceRevenueChart() {
    var serviceRevenueData = await fetchServiceRevenueData();

    // Get canvas element
    var canvas = document.getElementById('serviceRevenueChart');

    // Create chart
    var chart = new Chart(canvas, {
        type: 'line',
        data: {
            labels: serviceRevenueData.map((item, index) => `Minggu ${index + 1}`),
            datasets: [{
                label: 'Pemasukan dari Jasa (Rupiah)',
                data: serviceRevenueData.map(item => item.revenue),
                backgroundColor: 'rgba(255, 99, 132, 0.2)', 
                borderColor: 'rgba(255, 99, 132, 1)', 
                borderWidth: 2,
                pointRadius: 4,
                pointBackgroundColor: 'rgba(255, 99, 132, 1)', 
                pointBorderColor: 'rgba(255, 99, 132, 1)', 
                pointHoverRadius: 6,
                pointHoverBackgroundColor: 'rgba(255, 99, 132, 1)', 
                pointHoverBorderColor: 'rgba(255, 99, 132, 1)', 
                pointHitRadius: 10,
                pointBorderWidth: 2,
                lineTension: 0.3
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value, index, values) {
                            
                            return '$' + value.toLocaleString();
                        }
                    }
                }
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            
                            return '$' + context.parsed.y.toLocaleString();
                        }
                    }
                }
            }
        }
    });
}

// fetch the petshop goods sales data from the server
function fetchPetshopGoodsSalesData() {
    return fetch('fetch_data.php')
        .then(response => response.json())
        .then(data => data)
        .catch(error => console.error('Error:', error));
}

// update the petshop goods sales chart with the fetched data
async function updatePetshopGoodsChart() {
    var petshopGoodsSalesData = await fetchPetshopGoodsSalesData();

    // Get canvas element
    var canvas = document.getElementById('petshopGoodsChart');

    // Create chart
    var chart = new Chart(canvas, {
        type: 'line',
        data: {
            labels: petshopGoodsSalesData.map(item => item.label),
            datasets: [{
                label: 'Pemasukan dari Barang (Rupiah)',
                data: petshopGoodsSalesData.map(item => item.sales),
                backgroundColor: 'rgba(54, 162, 235, 0.2)', 
                borderColor: 'rgba(54, 162, 235, 1)', 
                borderWidth: 2,
                pointRadius: 4,
                pointBackgroundColor: 'rgba(54, 162, 235, 1)', 
                pointBorderColor: 'rgba(54, 162, 235, 1)', 
                pointHoverRadius: 6,
                pointHoverBackgroundColor: 'rgba(54, 162, 235, 1)', 
                pointHoverBorderColor: 'rgba(54, 162, 235, 1)', 
                pointHitRadius: 10,
                pointBorderWidth: 2,
                lineTension: 0.3
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value, index, values) {
                            
                            return '$' + value.toLocaleString();
                        }
                    }
                }
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            
                            return '$' + context.parsed.y.toLocaleString();
                        }
                    }
                }
            }
        }
    });
}

// fetch the top selling petshop goods data from the server
function fetchTopSellingGoodsData() {
    return fetch('fetch_top_selling_goods.php')
        .then(response => response.json())
        .then(data => data)
        .catch(error => console.error('Error:', error));
}

// update the top selling petshop goods chart with the fetched data
async function updateTopSellingGoodsChart() {
    var topSellingGoodsData = await fetchTopSellingGoodsData();

    // Get canvas element
    var canvas = document.getElementById('topSellingGoodsChart');

    // Create chart
    var chart = new Chart(canvas, {
        type: 'pie',
        data: {
            labels: topSellingGoodsData.map(item => item.label),
            datasets: [{
                label: 'Top Selling Petshop Goods',
                data: topSellingGoodsData.map(item => item.quantity),
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)', 
                    'rgba(54, 162, 235, 0.2)', 
                    'rgba(255, 205, 86, 0.2)', 
                    'rgba(75, 192, 192, 0.2)', 
                    'rgba(153, 102, 255, 0.2)' 
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 205, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            var label = context.label || '';

                            if (label) {
                                label += ': ';
                            }
                            label += '$' + context.parsed.y.toLocaleString();

                            return label;
                        }
                    }
                }
            }
        }
    });
}

// fetch the revenue trend data from the server
function fetchRevenueTrendData() {
return fetch('fetch_revenue_trend.php')
    .then(response => response.json())
    .then(data => data)
    .catch(error => console.error('Error:', error));
}

// update the revenue trend chart with the fetched data
async function updateRevenueTrendChart() {
var revenueTrendData = await fetchRevenueTrendData();

// Get canvas element
var canvas = document.getElementById('revenueTrendChart');

// Create chart
var chart = new Chart(canvas, {
    type: 'bar',
    data: {
    labels: revenueTrendData.map((item, index) => `Minggu ${index + 1}`),
    datasets: [{
        label: 'Total Pendapatan (Rupiah)',
        data: revenueTrendData.map(item => item.weekly_revenue),
        backgroundColor: 'rgba(75, 192, 192, 0.2)', 
        borderColor: 'rgba(75, 192, 192, 1)', 
        borderWidth: 2
    }]
    },
    options: {
    scales: {
        y: {
        beginAtZero: true,
        ticks: {
            callback: function(value, index, values) {
            
            return 'Rp ' + value.toLocaleString();
            }
        }
        }
    },
    plugins: {
        tooltip: {
        callbacks: {
            label: function(context) {
            
            return 'Rp ' + context.parsed.y.toLocaleString();
            }
        }
        }
    }
    }
});
}
// Call the functions to update charts
updateServiceRevenueChart();
updatePetshopGoodsChart();
updateTopSellingGoodsChart();
updateRevenueTrendChart();