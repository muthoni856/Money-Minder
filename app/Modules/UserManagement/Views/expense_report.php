<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Report</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        #expenseChart {
            max-width: 300px;  
            max-height: 300px; 
            margin: 0 auto;    
        }

        .container {
            text-align: center; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Expense Report for <?= session()->get('username'); ?></h2>
        <canvas id="expenseChart"></canvas> 
        <br>
        <button 
            style="
                margin-top: 20px; /* Add spacing above the button */
                background-color: #9B3AA5; /* Button background color */
                color: white; /* Button text color */
                border: none; /* Remove border */
                padding: 10px 20px; /* Button padding */
                border-radius: 5px; /* Rounded corners */
                cursor: pointer; /* Pointer cursor on hover */
                font-size: 16px; /* Font size */
                transition: background-color 0.3s ease; /* Smooth background color transition */
            "
            onmouseover="this.style.backgroundColor='#8B2A95';" 
            onmouseout="this.style.backgroundColor='#9B3AA5';"
            onclick="window.location.href='/'"
        >
            Back to Homepage
        </button>
    </div>

    <script>
        // Prepare data for the chart
        const expenseData = <?= json_encode($expense_report); ?>;
        const labels = expenseData.map(item => item.category);
        const data = expenseData.map(item => item.total);

        const ctx = document.getElementById('expenseChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'bar',  
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Expenses by Category',
                    data: data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,  
                plugins: {
                    legend: {
                        position: 'top',
                    }
                }
            }
        });
    </script>
</body>
</html>
