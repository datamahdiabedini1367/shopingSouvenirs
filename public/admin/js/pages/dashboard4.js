//[Dashboard Javascript]

//Project:	CrmX Admin - Responsive Admin Template
//Primary use:   Used only for the main dashboard (index.html)


$(function () {

  'use strict';


		var ctx6 = document.getElementById('earning');
		  new Chart(ctx6, {
			type: 'line',
			data: {
			  labels: ['ژان', 'فور', 'مار', 'آور', 'مه', 'ژوئن', 'ژول', 'آگو', 'سپت', 'اوک', 'نوا', 'دسا'],
			  datasets: [{
				data: [10, 18, 11, 8, 14, 25, 12, 7, 13, 25, 18, 6],
				backgroundColor: 'rgba(56, 100, 159, 0.8)',
				borderWidth: 1,
				fill: true
			  },{
				data: [6, 9, 22, 12, 7, 18, 12, 22, 9, 7, 10, 19],
				backgroundColor: 'rgba(238, 16, 68, 0.8)',
				borderWidth: 1,
				fill: true
			  }]
			},
			options: {
			  legend: {
				display: false,
				  labels: {
					display: false
				  }
			  },
			  scales: {
				yAxes: [{
				  ticks: {
					beginAtZero:true,
					fontSize: 10,
					max: 30
				  }
				}],
				xAxes: [{
				  ticks: {
					beginAtZero:true,
					fontSize: 11
				  }
				}]
			  }
			}
		  });
	
		
		var options = {
            chart: {
                height: 380,
                type: 'bar',
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    endingShape: 'rounded',
                    columnWidth: '55%',
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
			colors:['#689f38', '#38649f', '#ff8f00', '#ee1044'],
            series: [{
                name: 'عمومی',
                data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
            }, {
                name: 'واحد مراقبت های ویژه',
                data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
            }, {
                name: 'درمانگر شغلی',
                data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
            }, {
                name: 'اورژانسی',
                data: [12, 14, 25, 10, 18, 15, 17, 12, 11]
            }],
            xaxis: {
                categories: ['فور', 'مار', 'آور', 'مه', 'ژوئن', 'ژول', 'آگو', 'سپت', 'اوک'],
            },
            fill: {
                opacity: 1

            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return "0" + val + " Patients"
                    }
                }
            }
        }

        var chart = new ApexCharts(
            document.querySelector("#patients-overview"),
            options
        );

        chart.render();
	
	  $('.inner-user-div').slimScroll({
		height: '370px'
	  });
	
	
	
//dashboard_daterangepicker
	
	if(0!==$("#dashboard_daterangepicker").length) {
		var n=$("#dashboard_daterangepicker"),
		e=moment(),
		t=moment();
		n.daterangepicker( {
			startDate:e, endDate:t, opens:"left", ranges: {
				امروز: [moment(), moment()], دیروز: [moment().subtract(1, "days"), moment().subtract(1, "days")], "7 روز گذشته": [moment().subtract(6, "days"), moment()], "30 روز گذشته": [moment().subtract(29, "days"), moment()], "این ماه": [moment().startOf("month"), moment().endOf("month")], "ماه گذشته": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")]
			}
		}
		, a),
		a(e, t, "")
	}
	function a(e, t, a) {
		var r="",
		o="";
		t-e<100||"Today"==a?(r="امروز:", o=e.format("MMM D")): "Yesterday"==a?(r="Yesterday:", o=e.format("MMM D")): o=e.format("MMM D")+" - "+t.format("MMM D"), n.find(".subheader_daterange-date").html(o), n.find(".subheader_daterange-title").html(r)
	}
	
	
}); // End of use strict




                


