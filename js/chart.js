 // Function to fetch data from the server
 function fetchData() {
    // Use AJAX to fetch data from the server
    $.ajax({
        url: 'fetchdata.php', // Update with your server-side script to fetch data
        method: 'GET',
        success: function (data) {
            // On successful response, call function to update chart
            updateChart(data);
        },
        error: function (xhr, status, error) {
            console.error(error); // Log any errors
        }
    });
}

// Function to update the chart with fetched data
function updateChart(data) {
    // Parse the JSON data
    var jsonData = JSON.parse(data);

    // Extract relevant data for chart
    var labels = jsonData.labels;
    var counts = jsonData.counts;

    // Define an array of colors for each sport
    var colors = ['#FF5733', '#33FF77', '#3366FF', '#FF33FF', '#FFFF33']; // You can add more colors as needed

    // Get chart canvas element
    var ctx = document.getElementById('studentChart').getContext('2d');

    // Create an array to store dataset objects
    var datasets = [];

    // Iterate over each sport and assign a color
    for (var i = 0; i < counts.length; i++) {
        datasets.push({
            label: labels[i], // Use sport name as label
            data: [counts[i]], // Use count as data
            backgroundColor: colors[i], // Assign color based on index
            borderColor: 'rgba(54, 162, 235, 1)', // Border color for bars
            borderWidth: 1
        });
    }

    // Create a new chart instance
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [''], // Provide an empty label to display legends correctly
            datasets: datasets // Use the dynamically created datasets array
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true, // Start y-axis from zero
                    grid: {
                        color: 'rgba(0, 0, 0, 0.1)' // Color of grid lines
                    },
                    ticks: {
                        font: {
                            size: 12, // Font size of y-axis labels
                            weight: 'semibold' // Font weight of y-axis labels
                        },
                    }
                },
                x: {
                    grid: {
                        display: false // Hide x-axis grid lines
                    },
                    ticks: {
                        font: {
                            size: 12, // Font size of x-axis labels
                            weight: 'bold' // Font weight of x-axis labels
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    display: true, // Show legend
                    position: 'top', // Position of legend (top, bottom, left, right)
                    labels: {
                        font: {
                            size: 14, // Font size of legend labels
                            weight: 'semibold' // Font weight of legend labels
                        },
                    }
                },
                title: {
                    display: true,
                    text: 'Number of Students by Sport', // Chart title
                    font: {
                        size: 20, // Font size of chart title
                        weight: 'bold' // Font weight of chart title
                    }
                }
            }
        }
    });
}


// Call the fetchData function when the document is ready
$(document).ready(function () {
    fetchData();
});