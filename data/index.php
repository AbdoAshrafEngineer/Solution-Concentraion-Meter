<!DOCTYPE HTML><html>
    <head>
        <title>Web page App</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- <link rel="icon" type="image/png" href="favicon.png"> -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="style.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
        </script>

    </head>

    <body>
        <div class="header">
            <div class="container">
                <nav class="nav-header">
                    <div>
                        <a href="#"><i class="fa fa-gear" style="font-size:24px;"></i></a>
                    </div>
                    <div>
                        <a href="#">
                            <i class="fa fa-user-circle-o" style="font-size:26px"></i>
                            Ahmed Omda
                        </a>
                    </div>
                    <div class="light">
                        <a href="#">&#955; : </a>
                        <a id="lamp" onclick="light_On_Off()"><i class="fa fa-lightbulb-o" style="font-size:30px"></i></a>
                    </div> 
                </nav>
            </div>
        </div>

        <div class="container-body">
            <div class="side-bar">
                <p class="name" style="color: #fd0000;">Discrete Scan(RGB)</p>
                <div class="methods">
                    <p style="font-size:20px;">List Of Methods :</p>
                    <a onclick="FE_In_Water()" style="cursor:pointer">FE in Water</a>
                    <a onclick="Lead_analysis()" style="cursor:pointer">Lead Analysis</a>
                </div>
            </div>

            <div class="section-body">
                <div class="instructions">
                    <a href="../../home page/index.html">
                        <button class="btn" style="background-color: #f4511e;"><i class="fa fa-home"></i>Home</button>
                    </a>
                    <a>
                        <button class="btn" style="background-color: royalblue;"><i class="fa fa-plus"></i> New</button>
                    </a>
                    <a href="#">
                        <button class="btn" style="background-color: green;"><i class="fa fa-save"></i> Save</button>
                    </a>
                    <!-- <button class="btn" style="background-color: greenyellow;"><i class="fa fa-pencil"></i>SaveAs</button> -->
                    <button class="btn" style="background-color: red;"><i class="fa fa-trash"></i> Delete</button>
                    <br><br>
                </div>
                <br><br>

                <div class="view-outputs">
                    <div >Power supply(5v) : <span id="supply-5v"></span></div><br>
                    <div >Power supply(24v) :  <span id="supply-24v"></span> </div><br>
                    <div id="sol1">Sol(1) : %STATE_sol1% </div><br>
                </div>
                <br><br>

                <div class="motor">
                    <div class="topnav">
                        <h1>Stepper Motor Control <i class="fas fa-cogs"></i></h1>
                    </div><br><br>
                    
                    <div class="content">
                        <form class="motor-form">
                            <input type="radio" id="CW" name="direction" value="CW" checked>
                            <label for="CW">Clockwise</label>
                            <input type="radio" id="CCW" name="direction" value="CCW">
                            <label for="CW">Counterclockwise</label><br><br><br>
                            <label for="steps">Number of steps:</label>
                            <input type="number" id="steps" name="steps"><br><br><br>

                            <input type="radio" id="M1" name="chickmotor" value="M1" checked>
                            <label for="M1">First Motor</label>
                            <input type="radio" id="M2" name="chickmotor" value="M2">
                            <label for="M2">Second Motor</label><br><br><br>
                        </form>
                        <button class="motor-btn" onclick="submitForm()">Motor GO!</button>
                        <p class="state_gear">Motor state: <span id="motor-state">Stopped</span></p>
                        <p class="state_gear"><i id="gear" class="fas fa-cog"></i> </p>
                    </div>
                </div>
                <br>

                <div class="parameter">
                    <!-- <h3 style="text-decoration: underline;">>> Method Parameter</h3> -->
                    <div class="topnav">
                        <h1>Method Parameter</h1>
                    </div>
                    <div class="form">
                        <form method="post" action="form.php">
                            <input type="text" name="Laser_Light" placeholder="Laser_Light" required> <br>
                            <input type="text" name="Wavelength" placeholder="Wavelength" required> <br>
                            <br><br>
                            <a >
                                <button class="btn2" type="submit" name="submit"  style="background-color: royalblue;">Run</button>
                            </a>

                            <a>
                                <button id="button" class="btn2" style="background-color: royalblue;">Pause</button>
                            </a>    
                            <a>
                                <button class="btn2" style="background-color: royalblue;">Stop</button>
                            </a>
                        </form>
                        <br><br>
                    </div>                    
                </div>
                <br><br><br>

                <div style="border-bottom: 2px solid #333;">
                    <table id="table1" style="margin-top: 2rem; margin-bottom: 3rem">
                        <tr>
                            <th>Laser Light</th>
                            <th>Wavelength(nm)</th>
                            <th>Absorption(Au)</th>
                            <th>Concentration(g/L)</th>
                        </tr>
                        
                        
                    </table>
                </div>

                <div class="sample" id="sample1" >
                    <!-- name of sample -->
                </div>
                
                <div>
                    <table id="content" style="margin-bottom: 7rem">
                    </table>
                </div>

                <canvas id="myChart" style="width:100%; height:450; max-width:800px; margin-bottom: 6rem"></canvas>

            </div>
            
        </div>
        
        <div class="footer">
            <nav class="nav-footer">
                <div>
                    <p>Date/Time : </p>
                    <p>Current Status : </p>
                </div>
                <div>
                    <P>Active Method</P>
                </div>
                <div>
                    <p>Serial Number : </p>
                    <p>Model(Name)</p>
                </div> 
            </nav>
        </div>

        <script>
            var gateway = `ws://${window.location.hostname}/ws`;
            var websocket;
            var direction;
            var chickmotor;
            var sense_5v;

            window.addEventListener('load', onload);

            function onload(event) {
                initWebSocket();
            }

            function initWebSocket() {
                console.log('Trying to open a WebSocket connection…');
                websocket = new WebSocket(gateway);
                websocket.onopen = onOpen;
                websocket.onclose = onClose;
                websocket.onmessage = onMessage;
            }

            function onOpen(event) {
                console.log('Connection opened');
            }

            function onClose(event) {
                console.log('Connection closed');
                setTimeout(initWebSocket, 2000);
            }

            function submitForm(){
                const rbs = document.querySelectorAll('input[name="direction"]');
                direction;
                for (const rb of rbs) {
                    if (rb.checked) {
                        direction = rb.value;
                        break;
                    }
                }

                const mts = document.querySelectorAll('input[name="chickmotor"]');
                chickmotor;
                for (const mt of mts) {
                    if (mt.checked) {
                        chickmotor = mt.value;
                        break;
                    }
                }

                console.log(direction);
                console.log(chickmotor);

                if(chickmotor == "M1")
                {
                document.getElementById("motor-state").innerHTML = "Fisrt motor spinning...";
                document.getElementById("motor-state").style.color = "blue";
                }else if(chickmotor == "M2")
                {
                document.getElementById("motor-state").innerHTML = "Second motor spinning...";
                document.getElementById("motor-state").style.color = "blue";
                }   
                
                if (direction=="CW"){
                    document.getElementById("gear").classList.add("spin");
                }
                else{
                    document.getElementById("gear").classList.add("spin-back");
                }
                
                var steps = document.getElementById("steps").value;
                websocket.send(steps+"&"+direction+"&&"+chickmotor);
            }

            function onMessage(event) {
                console.log(event.data);
                sense_5v = event.data;
                // var json_obj = JSON.parse(event.data);

                if (direction=="stop"){ 
                    document.getElementById("motor-state").innerHTML = "motor stopped"
                    document.getElementById("motor-state").style.color = "red";
                    document.getElementById("gear").classList.remove("spin", "spin-back");
                }
                else if(direction=="CW" || direction=="CCW")
                {
                    document.getElementById("motor-state").innerHTML = "motor spinning...";
                    document.getElementById("motor-state").style.color = "blue";
                    if (direction=="CW"){
                        document.getElementById("gear").classList.add("spin");
                    }
                    else{
                        document.getElementById("gear").classList.add("spin-back");
                    }
                }
                
                if(chickmotor == "M1")
                {
                    document.getElementById("motor-state").innerHTML = "Fisrt motor spinning...";
                    document.getElementById("motor-state").style.color = "blue";
                }else if(chickmotor == "M2")
                {
                    document.getElementById("motor-state").innerHTML = "Second motor spinning...";
                    document.getElementById("motor-state").style.color = "blue";
                }

                document.getElementById("supply-5v").innerHTML = sense_5v;
                // document.getElementById("supply-24v").innerHTML = ;
                // document.getElementById("sol1").innerHTML = ;
            }

            function light_On_Off()
            {
                var lamp = document.getElementById("lamp");
                if(lamp.style.color != "yellow")
                {
                    lamp.style.color = 'yellow';
                } else {
                    lamp.style.color = 'white';
                } 
            }

            function show_WL()
            {
                document.querySelector('#table1').insertAdjacentHTML(
                    'afterbegin',
                    `<tr>
                        <th>WL1</th>
                        <th>WL2</th>
                        <th>WL3</th>
                        <th>A1</th>
                        <th>A2</th>
                        <th>A3</th>
                    </tr>
                    <?php 
                        include ('table1.php');
                    ?>
                    `
                )
            }

            function FE_In_Water()
            {
                document.querySelector('#sample1').insertAdjacentHTML(
                    'afterbegin',
                    `<p class="sample-name">>> FE in Water</p>`
                )

                document.querySelector('#content').insertAdjacentHTML(
                    'afterbegin',
                    `<tr>
                        <th>Sample Name</th>
                        <th>Description</th>
                        <th>WL1</th>
                        <th>WL2</th>
                        <th>WL3</th>
                        <th>Equation</th>
                    </tr>   
                    <?php 
                        include ('home.php');
                    ?>`
                )
            }

            function Lead_analysis()
            {   
                document.querySelector('#sample1').insertAdjacentHTML(
                    'afterbegin',
                    `<p class="sample-name">>> Lead Analysis</p>`
                )

                document.querySelector('#content').insertAdjacentHTML(
                    'afterbegin',
                    `<tr>
                        <th>Sample Name</th>
                        <th>Description</th>
                        <th>WL1</th>
                        <th>WL2</th>
                        <th>WL3</th>
                        <th>Equation</th>
                    </tr>   
                    <?php 
                        include ('home.php');
                    ?>`
                )
            }

            

            // var A1 = '<?=$l_row['A1']?>';
            // var C1 = '<?=$l_row['C1']?>';
            // var A2 = '<?=$l_row['A2']?>';
            // var C2 = '<?=$l_row['C2']?>';
            // var A3 = '<?=$l_row['A3']?>';
            // var C3 = '<?=$l_row['C3']?>';

            // var A11 = '<?=$sl_row['A1']?>';
            // var C11 = '<?=$sl_row['C1']?>';
            // var A22 = '<?=$sl_row['A2']?>';
            // var C22 = '<?=$sl_row['C2']?>';
            // var A33 = '<?=$sl_row['A3']?>';
            // var C33 = '<?=$sl_row['C3']?>';

            // var A111 = '<?=$tl_row['A1']?>';
            // var C111 = '<?=$tl_row['C1']?>';
            // var A222 = '<?=$tl_row['A2']?>';
            // var C222 = '<?=$tl_row['C2']?>';
            // var A333 = '<?=$tl_row['A3']?>';
            // var C333 = '<?=$tl_row['C3']?>';
            // // fetch('chart.php')
            // //     .then(response => response.json())
            // //     .then(data => {
            // //         console.log(data)

            // //     }).catch((error) => {
            // //         console.error('Error:', error);
            // //     });
            // var xyValues1 = [
            //     {x:C1, y:A1},
            //     {x:C2, y:A2},
            //     {x:C3, y:A3},
            // ];
            // var xyValues2 = [
            //     {x:C11, y:A11},
            //     {x:C22, y:A22},
            //     {x:C33, y:A33},
                
            // ];
            // var xyValues3 = [
            //     {x:C111, y:A111},
            //     {x:C222, y:A222},
            //     {x:C333, y:A333},
                
            // ];

            // new Chart("myChart", {
            //     type: "scatter",
            //     data: {
            //         datasets: [
            //             {
            //             pointRadius: 6,
            //             pointBackgroundColor: "rgb(0,0,255)",
            //             data: xyValues1,
            //             },
            //             {
            //             pointRadius: 6,
            //             pointBackgroundColor: "rgb(255,0,0)",
            //             data: xyValues2
            //             },
            //             {
            //             pointRadius: 6,
            //             pointBackgroundColor: "rgb(0,255,0)",
            //             data: xyValues3
            //             }   
            //         ]
            //     },
            //     options: {
            //         legend: {display: false},
            //         title: {
            //             display: true,
            //             text: ' Absorbance VS Concentration',
            //             fontSize: 20,
            //         },
            //         scales: {
            //             yAxes: [{
            //                 scaleLabel: {
            //                     display: true,
            //                     labelString: 'Absorbance',
            //                     font: {
            //                         size: 18,
            //                     }
            //                 }
            //             }],
            //             xAxes: [{
            //                 scaleLabel: {
            //                     display: true,
            //                     labelString: 'Concentration'
            //                 }
            //             }],
            //         }
            //     }
            // });
            

        </script>
    </body>
</html>

