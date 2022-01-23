$(function() {
    "use strict";
    // ------------------------------
    // Basic pie chart
    // ------------------------------
    // based on prepared DOM, initialize echarts instance
        var basicpieChart = echarts.init(document.getElementById('basic-pie'));
        var option = {
            // Add title
                title: {
                    text: 'منبع دسترسی کاربر سایت',
                    subtext: 'کاملا تخیلی',
                    x: 'center'
                },

                // Add tooltip
                tooltip: {
                    trigger: 'item',
                    formatter: "{a} <br/>{b}: {c} ({d}%)"
                },

                // Add legend
                legend: {
                    orient: 'vertical',
                    x: 'left',
                    data: ['سترسی مستقیم', 'بازاریابی ایمیل', 'آگهی اتحادیه', 'آگهی ویدیویی', 'موتور جستجو']
                },

                // Add custom colors
                color: ['#689f38', '#38649f', '#389f99', '#ee1044', '#ff8f00'],

                // Display toolbox
                toolbox: {
                    show: true,
                    orient: 'vertical',
                    feature: {
                        mark: {
                            show: true,
                            title: {
                                mark: 'Markline switch',
                                markUndo: 'Undo markline',
                                markClear: 'Clear markline'
                            }
                        },
                        dataView: {
                            show: true,
                            readOnly: false,
                            title: 'مشاهده داده',
                            lang: ['مشاهده داده های نمودار', 'بستن', 'بروزرسانی']
                        },
                        magicType: {
                            show: true,
                            title: {
                                pie: 'Switch to pies',
                                funnel: 'Switch to funnel',
                            },
                            type: ['pie', 'funnel'],
                            option: {
                                funnel: {
                                    x: '25%',
                                    y: '20%',
                                    width: '50%',
                                    height: '70%',
                                    funnelAlign: 'left',
                                    max: 1548
                                }
                            }
                        },
                        restore: {
                            show: true,
                            title: 'بازگرداندن'
                        },
                        saveAsImage: {
                            show: true,
                            title: 'Same as image',
                            lang: ['Save']
                        }
                    }
                },

                // Enable drag recalculate
                calculable: true,

                // Add series
                series: [{
                    name: 'Marketing',
                    type: 'pie',
                    radius: '70%',
                    center: ['50%', '57.5%'],
                    data: [
                        {value: 335, name: 'سترسی مستقیم'},
                        {value: 310, name: 'بازاریابی ایمیل'},
                        {value: 234, name: 'آگهی اتحادیه'},
                        {value: 135, name: 'آگهی ویدیویی'},
                        {value: 1548, name: 'موتور جستجو'}
                    ]
                }]
        };
    
        basicpieChart.setOption(option);
    // ------------------------------
    // Basic pie chart
    // ------------------------------
    // based on prepared DOM, initialize echarts instance
        var basicdoughnutChart = echarts.init(document.getElementById('basic-doughnut'));
        var option = {
            // Add title
                title: {
                    text: 'منبع دسترسی کاربر سایت',
                    subtext: 'کاملا تخیلی',
                    x: 'center'
                },

                // Add legend
                legend: {
                    orient: 'vertical',
                    x: 'left',
                    data: ['سترسی مستقیم', 'بازاریابی ایمیل', 'آگهی اتحادیه', 'آگهی ویدیویی', 'موتور جستجو']
                },

                // Add custom colors
                color: ['#689f38', '#38649f', '#389f99', '#ee1044', '#ff8f00'],

                // Display toolbox
                toolbox: {
                    show: true,
                    orient: 'vertical',
                    feature: {
                        mark: {
                            show: true,
                            title: {
                                mark: 'Markline switch',
                                markUndo: 'Undo markline',
                                markClear: 'Clear markline'
                            }
                        },
                        dataView: {
                            show: true,
                            readOnly: false,
                            title: 'مشاهده داده',
                            lang: ['مشاهده داده های نمودار', 'بستن', 'بروزرسانی']
                        },
                        magicType: {
                            show: true,
                            title: {
                                pie: 'Switch to pies',
                                funnel: 'Switch to funnel',
                            },
                            type: ['pie', 'funnel'],
                            option: {
                                funnel: {
                                    x: '25%',
                                    y: '20%',
                                    width: '50%',
                                    height: '70%',
                                    funnelAlign: 'left',
                                    max: 1548
                                }
                            }
                        },
                        restore: {
                            show: true,
                            title: 'بازگرداندن'
                        },
                        saveAsImage: {
                            show: true,
                            title: 'Same as image',
                            lang: ['Save']
                        }
                    }
                },

                // Enable drag recalculate
                calculable: true,

                // Add series
                series: [
                    {
                        name: 'Marketing',
                        type: 'pie',
                        radius: ['50%', '70%'],
                        center: ['50%', '57.5%'],
                        itemStyle: {
                            normal: {
                                label: {
                                    show: true
                                },
                                labelLine: {
                                    show: true
                                }
                            },
                            emphasis: {
                                label: {
                                    show: true,
                                    formatter: '{b}' + '\n\n' + '{c} ({d}%)',
                                    position: 'center',
                                    textStyle: {
                                        fontSize: '17',
                                        fontWeight: '500'
                                    }
                                }
                            }
                        },

                        data: [
                            {value: 335, name: 'سترسی مستقیم'},
                        	{value: 310, name: 'بازاریابی ایمیل'},
                        	{value: 234, name: 'آگهی اتحادیه'},
                        	{value: 135, name: 'آگهی ویدیویی'},
                        	{value: 1548, name: 'موتور جستجو'}
                        ]
                    }
                ]
        };
    
        basicdoughnutChart.setOption(option);
    // ------------------------------
    // customized chart
    // ------------------------------
    // based on prepared DOM, initialize echarts instance
        var customizedChart = echarts.init(document.getElementById('customized-chart'));
        var option = {
            
            backgroundColor: '#fff',

            title: {
                text: 'Customized Pie',
                left: 'center',
                top: 20,
                textStyle: {
                    color: '#ccc'
                }
            },

            tooltip : {
                trigger: 'item',
                formatter: "{a} <br/>{b} : {c} ({d}%)"
            },

            visualMap: {
                show: false,
                min: 80,
                max: 600,
                inRange: {
                    colorLightness: [0, 1]
                }
            },
            series : [
                {
                    name:'Marketing',
                    type:'pie',
                    radius : '55%',
                    center: ['50%', '50%'],
                    data:[
                        {value:335, name:'سترسی مستقیم'},
                        {value:310, name:'بازاریابی ایمیل'},
                        {value:274, name:'آگهی اتحادیه'},
                        {value:235, name:'آگهی ویدیویی'},
                        {value:400, name:'موتور جستجو'}
                    ].sort(function (a, b) { return a.value - b.value; }),
                    roseType: 'radius',
                    label: {
                        normal: {
                            textStyle: {
                                color: 'rgba(0, 0, 0, 0.3)'
                            }
                        }
                    },
                    labelLine: {
                        normal: {
                            lineStyle: {
                                color: 'rgba(0, 0, 0, 0.3)'
                            },
                            smooth: 0.2,
                            length: 10,
                            length2: 20
                        }
                    },
                    itemStyle: {
                        normal: {
                            color: '#38649f',
                            shadowBlur: 200,
                            shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                    },

                    animationType: 'scale',
                    animationEasing: 'elasticOut',
                    animationDelay: function (idx) {
                        return Math.random() * 200;
                    }
                }
            ]
        };    
       
    
        customizedChart.setOption(option);
    // ------------------------------
    // Nested chart
    // ------------------------------
    // based on prepared DOM, initialize echarts instance
        var nestedChart = echarts.init(document.getElementById('nested-pie'));
        var option = {
            
           tooltip: {
                    trigger: 'item',
                    formatter: "{a} <br/>{b}: {c} ({d}%)"
                },

                // Add legend
                legend: {
                    orient: 'vertical',
                    x: 'left',
                    data: ['مستقیم','تبلیغات بازاریابی','موتور جستجو','بازاریابی ایمیل','آگهی اتحادیه','آگهی ویدیویی','بایدو','گوگل','بینگ','سایر']
                },

                // Add custom colors
                color: ['#689f38', '#38649f', '#389f99', '#ee1044', '#ff8f00'],

                // Display toolbox
                toolbox: {
                    show: true,
                    orient: 'vertical',
                    feature: {
                        mark: {
                            show: true,
                            title: {
                                mark: 'Markline switch',
                                markUndo: 'Undo markline',
                                markClear: 'Clear markline'
                            }
                        },
                        dataView: {
                            show: true,
                            readOnly: false,
                            title: 'مشاهده داده',
                            lang: ['مشاهده داده های نمودار', 'بستن', 'بروزرسانی']
                        },
                        magicType: {
                            show: true,
                            title: {
                                pie: 'Switch to pies',
                                funnel: 'Switch to funnel',
                            },
                            type: ['pie', 'funnel']
                        },
                        restore: {
                            show: true,
                            title: 'بازگرداندن'
                        },
                        saveAsImage: {
                            show: true,
                            title: 'Same as image',
                            lang: ['Save']
                        }
                    }
                },

                // Enable drag recalculate
                calculable: false,

                // Add series
                series: [

                    // Inner
                    {
                        name: 'کشورها',
                        type: 'pie',
                        selectedMode: 'single',
                        radius: [0, '40%'],

                        // for funnel
                        x: '15%',
                        y: '7.5%',
                        width: '40%',
                        height: '85%',
                        funnelAlign: 'right',
                        max: 1548,

                        itemStyle: {
                            normal: {
                                label: {
                                    position: 'inner'
                                },
                                labelLine: {
                                    show: false
                                }
                            },
                            emphasis: {
                                label: {
                                    show: true
                                }
                            }
                        },

                        data: [
                            {value: 535, name: 'مستقیم'},
                            {value: 679, name: 'Marketing ad'},
                            {value: 1548, name: 'موتور جستجو'}
                        ]
                    },

                    // Outer
                    {
                        name: 'کشورها',
                        type: 'pie',
                        radius: ['60%', '85%'],

                        // for funnel
                        x: '55%',
                        y: '7.5%',
                        width: '35%',
                        height: '85%',
                        funnelAlign: 'left',
                        max: 1048,

                        data: [
                            {value:335, name: 'مستقیم'},
							{value:310, name: 'بازاریابی ایمیل'},
							{value:234, name: 'آگهی اتحادیه'},
							{value:135, name: 'آگهی ویدیویی'},
							{value:1048, name: 'بایدو'},
							{value:251, name:'گوگل'},
							{value:147, name: 'بینگ'},
							{value:102, name:'سایر'}
                        ]
                    }
                ]
        };    
       
    
        nestedChart.setOption(option);
        // ------------------------------
        // pole chart
        // ------------------------------
        // based on prepared DOM, initialize echarts instance
            var poleChart = echarts.init(document.getElementById('pole-chart'));
            // Data style
            var dataStyle = {
                normal: {
                    label: {show: false},
                    labelLine: {show: false}
                }
            };

            // Placeholder style
            var placeHolderStyle = {
                normal: {
                    color: 'rgba(0,0,0,0)',
                    label: {show: false},
                    labelLine: {show: false}
                },
                emphasis: {
                    color: 'rgba(0,0,0,0)'
                }
            };
            var option = {
                title: {
                    text: 'هیستوگرام انباشته شده',
                    subtext: 'داده های هفتگی',
                    x: 'center',
                    y: 'center',
                    itemGap: 10,
                    textStyle: {
                        color: 'rgba(30,144,255,0.8)',
                        fontSize: 19,
                        fontWeight: '500'
                    }
                },

                // Add tooltip
                tooltip: {
                    show: true,
                    formatter: "{a} <br/>{b}: {c} ({d}%)"
                },

                // Add legend
                legend: {
                    orient: 'vertical',
                    x: document.getElementById('pole-chart').offsetWidth / 2,
                    y: 30,
                    x: '55%',
                    itemGap: 15,
                    data: ['دوشنبه','سه شنبه','چهارشنبه']
                },

                // Add custom colors
                color: ['#689f38', '#38649f', '#ff8f00'],
 
                // Add series
                series: [
                    {
                        name: '1',
                        type: 'pie',
                        clockWise: false,
                        radius: ['75%', '90%'],
                        itemStyle: dataStyle,
                        data: [
                            {
                                value: 60,
                                name: 'دوشنبه'
                            },
                            {
                                value: 40,
                                name: 'invisible',
                                itemStyle: placeHolderStyle
                            }
                        ]
                    },

                    {
                        name: '2',
                        type:'pie',
                        clockWise: false,
                        radius: ['60%', '75%'],
                        itemStyle: dataStyle,
                        data: [
                            {
                                value: 30, 
                                name: 'سه شنبه'
                            },
                            {
                                value: 70,
                                name: 'invisible',
                                itemStyle: placeHolderStyle
                            }
                        ]
                    },

                    {
                        name: '3',
                        type: 'pie',
                        clockWise: false,
                        radius: ['45%', '60%'],
                        itemStyle: dataStyle,
                        data: [
                            {
                                value: 10, 
                                name: 'چهارشنبه'
                            },
                            {
                                value: 90,
                                name: 'invisible',
                                itemStyle: placeHolderStyle
                            }
                        ]
                    }
                ]
            };
        poleChart.setOption(option);
        // ------------------------------
        // nightingale chart
        // ------------------------------
        // based on prepared DOM, initialize echarts instance
            var nightingaleChart = echarts.init(document.getElementById('nightingale-chart'));
            var option = {
                 title: {
                    text: 'نقشه نینگینگن رز',
                    subtext: 'کاملا تخیلی',
                    x: 'center'
                },

                // Add tooltip
                tooltip: {
                    trigger: 'item',
                    formatter: "{a} <br/>{b}: +{c}$ ({d}%)"
                },

                // Add legend
                legend: {
                    x: 'left',
                    y: 'top',
                    orient: 'vertical',
                    data:['رز1','رز2','رز3','رز4','رز5','رز6','رز7','رز8']
                },

                color: ['#689f38', '#e4eaec', '#38649f', '#389f99', '#ee1044', '#ff8f00', '#673ab7', '#4974e0'],

                // Display toolbox
                toolbox: {
                    show: true,
                    orient: 'vertical',
                    feature: {
                        mark: {
                            show: true,
                            title: {
                                mark: 'Markline switch',
                                markUndo: 'Undo markline',
                                markClear: 'Clear markline'
                            }
                        },
                        dataView: {
                            show: true,
                            readOnly: false,
                            title: 'مشاهده داده',
                            lang: ['مشاهده داده های نمودار', 'بستن', 'بروزرسانی']
                        },
                        magicType: {
                            show: true,
                            title: {
                                pie: 'Switch to pies',
                                funnel: 'Switch to funnel',
                            },
                            type: ['pie', 'funnel']
                        },
                        restore: {
                            show: true,
                            title: 'بازگرداندن'
                        },
                        saveAsImage: {
                            show: true,
                            title: 'Same as image',
                            lang: ['Save']
                        }
                    }
                },

                // Enable drag recalculate
                calculable: true,

                // Add series
                series: [
                    {
                        name: 'حالت منطقه',
                        type: 'pie',
                        radius: ['15%', '73%'],
                        center: ['50%', '57%'],
                        roseType: 'area',

                        // Funnel
                        width: '40%',
                        height: '78%',
                        x: '30%',
                        y: '17.5%',
                        max: 450,
                        sort: 'ascending',

                        data: [
                            {value: 440, name: 'رز1'},
                            {value: 260, name: 'رز2'},
                            {value: 350, name: 'رز3'},
                            {value: 250, name: 'رز4'},
                            {value: 210, name: 'رز5'},
                            {value: 350, name: 'رز6'},
                            {value: 300, name: 'رز7'},
                            {value: 450, name: 'رز8'}
                        ]
                    }
                ]
            };
        nightingaleChart.setOption(option);
	
	
        // ------------------------------
        // bar-polar-stack-radial
        // ------------------------------	
	
		var dom = document.getElementById("bar-polar-stack-radial");
		var myChart = echarts.init(dom);
		var app = {};
		option = null;
		app.title = 'Stacked bar chart in polar coordinate system';

		option = {
			color: ['#689f38', '#38649f', '#389f99'],
			angleAxis: {
				type: 'category',
				data: ['دوشنبه', 'سه شنبه', 'چهارشنبه', 'سه شنبه', 'جمعه', 'شنبه', 'یکشنبه'],
				z: 10
			},
			radiusAxis: {
			},
			polar: {
			},
			series: [{
				type: 'bar',
				data: [1, 2, 3, 4, 3, 5, 1],
				coordinateSystem: 'polar',
				name: 'A',
				stack: 'a'
			}, {
				type: 'bar',
				data: [2, 4, 6, 1, 3, 2, 1],
				coordinateSystem: 'polar',
				name: 'B',
				stack: 'a'
			}, {
				type: 'bar',
				data: [1, 2, 3, 4, 1, 2, 5],
				coordinateSystem: 'polar',
				name: 'C',
				stack: 'a'
			}],
			legend: {
				show: true,
				data: ['A', 'B', 'C']
			}
		};
		if (option && typeof option === "object") {
			myChart.setOption(option, true);
		}
        //------------------------------------------------------
       // Resize chart on menu width change and window resize
       //------------------------------------------------------
        $(function () {

                // Resize chart on menu width change and window resize
                $(window).on('resize', resize);
                $(".sidebartoggler").on('click', resize);

                // Resize function
                function resize() {
                    setTimeout(function() {

                        // Resize chart
                        basicpieChart.resize();
                        basicdoughnutChart.resize();
                        customizedChart.resize();
                        nestedChart.resize();
                        poleChart.resize();
                    }, 200);
                }
            });
});