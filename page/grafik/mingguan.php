<?php


    $ambildata = mysqli_query($links,"SELECT * FROM `logdata` where waktu>=yearweek(curdate())");
    while ($tampil= mysqli_fetch_array($ambildata)) {
    	$daya_lis[]= $tampil['daya'];

    	$query= mysqli_query($links,"select waktu from logdata where id='".$tampil['id']."'");
    	$tampil = $query->fetch_array();
    	$waktudaya[]= $tampil['waktu'];
    }             

    //$result= mysqli_query("SELECT * FROM `templog` ORDER BY `timeStamp` DESC",$link);
?>

<div class="chart-area">
    <canvas id="myLineChart"></canvas>
</div>
<script>
	var ctx = document.getElementById("myLineChart");
	var myLineChart = new Chart(ctx, {
	  type: 'line',
	  data: {
	    labels: <?php echo json_encode($waktudaya);?>,
	    datasets: [{
	      label: "Daya Listrik (W) ",
	      lineTension: 0.3,
	      backgroundColor: "rgba(78, 115, 223, 0.05)",
	      borderColor: "rgba(78, 115, 223, 1)",
	      pointRadius: 3,
	      pointBackgroundColor: "rgba(78, 115, 223, 1)",
	      pointBorderColor: "rgba(78, 115, 223, 1)",
	      pointHoverRadius: 3,
	      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
	      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
	      pointHitRadius: 10,
	      pointBorderWidth: 2,
	      data: <?php echo json_encode($daya_lis); ?>,
	    }],
	  },
	  options: {
	    maintainAspectRatio: false,
	    layout: {
	      padding: {
	        left: 10,
	        right: 25,
	        top: 25,
	        bottom: 0
	      }
	    },
	    scales: {
	      xAxes: [{
	        time: {
	          unit: 'date'
	        },
	        gridLines: {
	          display: false,
	          drawBorder: false
	        },
	        ticks: {
	          maxTicksLimit: 7
	        }
	      }],
	      yAxes: [{
	        ticks: {
	          maxTicksLimit: 5,
	          padding: 10,
	          // Include a dollar sign in the ticks
	          
	        },
	        gridLines: {
	          color: "rgb(234, 236, 244)",
	          zeroLineColor: "rgb(234, 236, 244)",
	          drawBorder: false,
	          borderDash: [2],
	          zeroLineBorderDash: [2]
	        }
	      }],
	    },
	    legend: {
	      display: false
	    },
	    tooltips: {
	      backgroundColor: "rgb(255,255,255)",
	      bodyFontColor: "#858796",
	      titleMarginBottom: 10,
	      titleFontColor: '#6e707e',
	      titleFontSize: 14,
	      borderColor: '#dddfeb',
	      borderWidth: 1,
	      xPadding: 15,
	      yPadding: 15,
	      displayColors: false,
	      intersect: false,
	      mode: 'index',
	      caretPadding: 10,
	      callbacks: {
	      }
	    }
	  }
	});
</script>