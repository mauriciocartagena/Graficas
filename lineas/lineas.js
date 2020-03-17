var morris1 = new Morris.Line({
    // ID of the element in which to draw the chart.
    element: 'myfirstchart',
    // Chart data records -- each entry in this array corresponds to a point on
    // the chart.
    data: [
      { year: '2008', value: 20 ,value2:30},
      { year: '2009', value: 10 ,value2:40},
      { year: '2010', value: 5  ,value2:5},
      { year: '2011', value: 5  ,value2:40},
      { year: '2012', value: 20 ,value:30}
    ],
    // The name of the data record attribute that contains x-values.
    xkey: 'year',
    // A list of names of data record attributes that contain y-values.
    ykeys: ['value','value2'],
    lineWidth:1,
    // Labels for the ykeys -- will be displayed when you hover over the
    // chart.
    labels: ['Coca Cola','Pepsi'],
    resize:true,
    lineColors:['#C14d9f','#2CB4AC','#2CB4AC']
  });
  // Use Morris.Area instead of Morris.Line
  new Morris.Area({
    element: 'mysecondchart',
    data: [
      {x: '2010 Q4', y: 3, z: 7},
      {x: '2011 Q1', y: 3, z: 4},
      {x: '2011 Q2', y: null, z: 1},
      {x: '2011 Q3', y: 2, z: 5},
      {x: '2011 Q4', y: 8, z: 2},
      {x: '2012 Q1', y: 4, z: 4}
    ],
    xkey: 'x',
    ykeys: ['y', 'z'],
    labels: ['Y', 'Z'],
    resize:true,
    lineColors:['#1bbdfa','#6638f0','#b0f566']
  });
  




  $("#botData").on("click",function(){
    
    console.log(morris1);

    var nuevaData=[
      { year: '2012', value: 10, value2:  40},
      { year: '2013', value: 50, value2:  40},
      { year: '2014', value: 58, value2:  10},
      { year: '2015', value: 20, value2:  59},
      { year: '2016', value: 20, value2:  20},
      { year: '2017', value: 20, value2:  30},
    ];
    morris1.setData(nuevaData);
  });