
function fetchServiceRevenueData() {
    return fetch('fetch_service_revenue.php')
        .then(response => response.json())
        .then(data => data)
        .catch(error => console.error('Error:', error));
}

async function updateServiceRevenueChart() {
    var serviceRevenueData = await fetchServiceRevenueData();

    var canvas = document.getElementById('serviceRevenueChart');

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

function fetchPetshopGoodsSalesData() {
    return fetch('fetch_data.php')
        .then(response => response.json())
        .then(data => data)
        .catch(error => console.error('Error:', error));
}

async function updatePetshopGoodsChart() {
    var petshopGoodsSalesData = await fetchPetshopGoodsSalesData();

    var canvas = document.getElementById('petshopGoodsChart');

    var chart = new Chart(canvas, {
        type: 'line',
        data: {
            labels: petshopGoodsSalesData.map((item, index) => `Minggu ${index + 1}`),
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

function fetchTopSellingGoodsData() {
    return fetch('fetch_top_selling_goods.php')
        .then(response => response.json())
        .then(data => data)
        .catch(error => console.error('Error:', error));
}

async function updateTopSellingGoodsChart() {
    var topSellingGoodsData = await fetchTopSellingGoodsData();

    var canvas = document.getElementById('topSellingGoodsChart');

    var chart = new Chart(canvas, {
        type: 'pie',
        data: {
            labels: topSellingGoodsData.map(item => item.label),
            datasets: [{
                label: 'Top Selling Petshop Goods',
                data: topSellingGoodsData.map(item => item.quantity),
                backgroundColor: [
                    '#F3F393', 
                    '#93CEF3', 
                    '#f39398', 
                    '#93F395', 
                    '#f3c593' 
                ],
                borderColor: [
                    '#000000',
                    '#000000',
                    '#000000',
                    '#000000',
                    '#000000'
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

function fetchRevenueTrendData() {
return fetch('fetch_revenue_trend.php')
    .then(response => response.json())
    .then(data => data)
    .catch(error => console.error('Error:', error));
}

async function updateRevenueTrendChart() {
var revenueTrendData = await fetchRevenueTrendData();

var canvas = document.getElementById('revenueTrendChart');

var chart = new Chart(canvas, {
    type: 'bar',
    data: {
        labels: revenueTrendData.map((item, index) => `Minggu ${index + 1}`),
        datasets: [{
            label: 'Total Pendapatan (Rupiah)',
            data: revenueTrendData.map(item => item.weekly_revenue),
            backgroundColor: '#4bc0c0', // Solid color for the bars
            borderColor: '#535353',
            borderWidth: 2
        }]
    },
    options: {
        scales: {
            x: {
                grid: {
                    display: false // Remove x-axis grid lines
                }
            },
            y: {
                grid: {
                    display: false // Remove y-axis grid lines
                },
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