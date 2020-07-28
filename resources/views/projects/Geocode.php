<?php
#https://geodata.solutions/
#geocoding.geo.census.gov
#www.openstreetmap.org/

include_once 'includes/requires.php';



$address = array();
$address['Street'] = "1 Monument Cir";
$address['City'] = "Indianapolis";
$address['State'] = "IN";
$address['Zip'] = "46204";

if(isset($_GET['Street'])){
    $address['Street'] = $_GET['Street'];  
}
if(isset($_GET['City'])){
    $address['City'] = $_GET['City'];
}
if(isset($_GET['State'])){
    $address['State'] = $_GET['State'];
}
if(isset($_GET['Zip'])){
    $address['Zip'] = $_GET['Zip'];
}


if(isset($address)){
    
    $error="";
    
    $data = format_data($address);
    
    $url = "https://geocoding.geo.census.gov/geocoder/locations/address?".$data."&benchmark=Public_AR_Census2010&format=json";
    
    $location = fetch_curl($url);
    
    $location = JSON_decode($location, True);
    #pr($location);
    if(isset($location['result']['addressMatches']['0'])){
        
        $address['lat'] = $location['result']['addressMatches']['0']['coordinates']['x'];
        $address['long'] = $location['result']['addressMatches']['0']['coordinates']['y'];
    
    }else{
        $error = "No Address found";
    }
    echo '<br><br><br><br><br><br><br>';
    $weather_url="https://api.openweathermap.org/data/2.5/onecall?lat=".$address['long']."&lon=".$address['lat']."&units=imperial&appid=5244737e695977e5bd196caa2cfd0872";
    
    #pr($weather_url);
    
    $weather = fetch_curl($weather_url);
    
    $weather = JSON_decode($weather, True);
    
    
    #pr($address);
    #pr($weather);
}

include 'header.php';

?>
<style>


.jumbotron1 {
    padding: 2rem 1rem;
    margin-bottom: 2rem;
    background-color: #fff;
    border-radius: .3rem;
}
</style>



    <main role="main" class="container" style="margin-top: 100px;">
		<div class="row">
			<div class="col-12">
				<div class="jumbotron">
            
                    <form class="form-signin" action="Geocode.php" method="get">
            			<div class="form-group">
            				<div class="col-12 text-center">
            					<h1 class="h3 mb-3 font-weight-normal">Geocode Location</h1>
            				</div>
            			</div>
            			
            			<div class="form-group">
              				<div class="row">
              				
              					<div class="col-12 ">
            						<input type="text" name="Street" id="Street" class="form-control" placeholder="Street" value="<?php if(isset($address['Street'])){echo $address['Street'];}?>">
              					</div>
            				
            				</div>
            			</div>
            			<div class="form-group">
            				<div class="row">
              					<div class="col-5 ">
              					
              						<input type="hidden" name="country" id="countryId" value="US"/>
									<label for="City" class="sr-only">City</label>
                                    <select name="City" class="cities order-alpha form-control" id="cityId" value="<?php if(isset($address['City'])){echo $address['City'];}?>">
                                        <option value="">Select City</option>
                                    </select>
          					
            					</div>
            					<div class="col-3 ">
            						<label for="State" class="sr-only">State</label>
            						<select name="State" class="states order-alpha form-control" id="stateId" value="<?php if(isset($address['State'])){echo $address['State'];}?>">
                                        <option value="">Select State</option>
                                    </select>
                      			</div>
            					<div class="col-4 ">
            						<label for="Zip" class="sr-only">Zip</label>
                          			<input type="text" name="Zip" id="Zip" class="form-control" placeholder="Zip" value="<?php if(isset($address['Zip'])){echo $address['Zip'];}?>">
            					</div>
            				</div>
            				
            			</div>
                      	<div class="form-group">
                      		<div class="row">
                          		<div class="col-12">
                          			<button class="btn btn-lg btn-primary float-right" type="submit">Search</button>
                          		</div>
                      		</div>
                      	</div>
                      </form>
                    
                  </div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="jumbotron">
					<div class="row">
						<div class="col-12">
							<h3>Data on location</h3>
            					<p> 
            					<?php 
            					#pr($address);
            					#pr($location['result']);
            					if(isset($error) && $error != ""){
            					    echo $error;
            					    
            					}else{
            					    echo "Address Coordinates are Lat: <strong>". $address['lat']."</strong> AND Long: <strong>".$address['long']."</strong>"; 
            					}
            					
            					
            					$bbox1=$address['lat'] + .001;
            					$bbox2=$address['long'] + .001;
            					$bbox3=$address['lat'] - .001;
            					$bbox4=$address['long'] - .001;
            					
            					$bbox=$bbox1.'%2C'.$bbox2.'%2C'.$bbox3.'%2C'.$bbox4;
            					
            					?></p>
						</div>
					
					</div>
					
					
					<hr>
					<div class="row">
						<div class="col-12" style="padding:10px;">
							<iframe width="100%" height="450" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=<?php echo $bbox;?>&amp;layer=mapnik&amp;marker=<?php echo $address['long'];?>%2C<?php echo $address['lat'];?>" style="border: 1px solid black"></iframe><br/><small><a href="https://www.openstreetmap.org/?mlat=39.7684&amp;mlon=-86.1581#map=20/39.7684/-86.1581">View Larger Map</a></small>
						</div>
					
					</div>
					
				</div>
				
			</div>
		
		</div>
          
      <div class="row">
			<div class="col-12">
				<div class="jumbotron">
					<div class="row">
						<div class="col-12">
							<h3>Weather Data For <?php echo $weather['timezone'];?></h3>
            					<p> 
            					<?php 
            					#pr($weather['daily']);
            					
            					
            					
            					?></p>
						</div>
					</div>
					<div class="row form-group">
						<!-- current weather -->
						<div class="col-5 ">
							
								
							<div class="card mb-6 shadow-sm">
                              <div class="card-header">
                                <h4 class="my-0 font-weight-normal">Weather Today: <?php echo date("M d, Y", $weather['current']['dt']);?></h4>
                              </div>
                              <div class="card-body">
                                
                                <ul class="list-unstyled mt-3 mb-4">
                                  <li>Temp: <?php echo $weather['current']['temp'];?></li>
                                  <li>Feels Like: <?php echo $weather['current']['feels_like'];?></li>
                                  <li>Weather: <?php echo $weather['current']['weather']['0']['main'];?></li>
                                  <li>Summary: <?php echo $weather['current']['weather']['0']['description'];?></li>
                                  <li>Sunrise: <?php echo date("H:i:s", $weather['current']['sunrise']);?> </li>
                                  <li>Sunset: <?php echo date("H:i:s", $weather['current']['sunset']);?></li>
                                </ul>
                              </div>
                            </div>
								
							
						</div><!-- end col-6 current -->
						
						
						<?php 
		                $count = 1;
						$week = $weather['daily'];
						$weekly_weather = '';
						$sliders = ''; 
						foreach($week as $day){
						    if($count == 1){
						        $active = "active";
						    }else{
						        $active = "";
						    }
						    
						    
						    $sliders .='<li data-target="#myCarousel" data-slide-to="0" class="'.$active.'"></li>';
						    
						    #pr($day);
						    #pr($count);
						    $weekly_weather .= '

                                <div class="carousel-item '.$active.'">
                                    <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#777"/></svg>
                                    <div class="container">

                                      <div class="card mb-4 shadow-sm">
                                          <div class="card-header">
                                            <h4 class="my-0 font-weight-normal">'.date("D M, d", $day["dt"]).'</h4>
                                          </div>
                                          <div class="card-body">

                                            <ul class="list-unstyled mt-3 mb-4">
                                              <li>Temp: '.$day["temp"]["day"].' </li>
                                              <li>High: '.$day["temp"]["max"].' </li>
                                              <li>Low: '.$day["temp"]["min"].' </li>
                                              <li>Weather: '.$day["weather"]["0"]["main"].' </li>
                                              <li>Summary: '.$day["weather"]["0"]["description"].' </li>
                                              <li>Sunrise: '.date("H:i:s", $day["sunrise"]).' </li>
                                              <li>Sunset: '.date("H:i:s", $day["sunset"]).' </li>
                                            </ul>
				    
				    
				    
                                          </div>
                                       </div>
				    
				    
				    
                                    </div>
                                  </div>
				    
                            ';
						    $count ++;
						    
						};
						
						?>
						
						<div class="col-7 ">
							<div class="card mb-12 shadow-sm">
                              <div class="card-header">
                                <h4 class="my-0 font-weight-normal">Weather for Week of: <?php echo date("M d", $weather['current']['dt']). " - ". date("M d, Y", strtotime('+7 days'));?></h4>
                              </div>
                              <div class="card-body">
                                
                               <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                      <?php echo $sliders;?>
                                      
                                      
                                      
                                    </ol>
                                    <div class="carousel-inner">
                                    	<?php 
                						echo $weekly_weather;
                						
                						?>
                                      
                                      	
                                      
                                    </div>
                                    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                      <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                      <span class="sr-only">Next</span>
                                    </a>
                                  </div>
                                
                                
                                
                              </div>
                            </div>
                        </div><!-- end col-6 -->
					</div><!-- end row -->
					
					<div class="row form-group">
						<div class="col-12 ">
							<div class="card mb-12 shadow-sm">
                              <div class="card-header">
                                <h4 class="my-0 font-weight-normal">Weather Today: <?php echo date("M d, Y", $weather['current']['dt']);?></h4>
                              </div>
                              <div class="card-body">
                                
                               
                               
                               
                              </div>
                            </div>
							
						</div>
						
						
						
						
					</div>
					
					
				</div>
				
			</div>
		
		</div>
          
          
      <div class="row">
      	<div class="col-12">
      	
      		<footer class="pt-4 my-md-5 pt-md-5 border-top">
                <div class="row">
                  <div class="col-12 col-md">
                    <img class="mb-2" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="24" height="24">
                    <small class="d-block mb-3 text-muted">&copy; <?php echo date("Y");?></small>
                  </div>
                  <div class="col-6 col-md">
                    <h5>Projects</h5>
                    <ul class="list-unstyled text-small">
                      <li><a class="text-muted" href="Geocode.php">Geo Location</a></li>
                      <li><a class="text-muted" href="#">2 feature</a></li>
                      <li><a class="text-muted" href="crud-app.php">Crud app</a></li>
                      
                    </ul>
                  </div>
                  <div class="col-6 col-md">
                    <h5>Contact</h5>
                    <ul class="list-unstyled text-small">
                      <li><a class="text-muted" href="#">Resource</a></li>
                      <li><a class="text-muted" href="#">Resource name</a></li>
                      <li><a class="text-muted" href="#">Another resource</a></li>
                      <li><a class="text-muted" href="#">Final resource</a></li>
                    </ul>
                  </div>
                  
                </div>
             </footer>
      	</div>
      
      </div>
      
      
      
      
    </main><!-- /.container -->
	
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    
    
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
	<script src="//geodata.solutions/includes/statecity.js"></script>
  
  </body>
</html>
