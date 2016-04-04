<?php
session_start();
$_SESSION['count'] = 0;
$_SESSION['count'] = $_SESSION['count'] + 1;
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
<?php require("lib.php"); ?>
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3.19&signed_in=true&libraries=places&key=AIzaSyA-cZjoGMuveCNlvGPgABUEV5pzH3EyGqw"></script>
        <!--script type="text/javascript" src="ValidationLogic.js"></script-->
        <script type="text/javascript" src="search.js"></script>
        <script type="text/javascript" src="RestaurantLogic.js"></script>
        <script type="text/javascript" src="model/postreview.js"></script>
        <script type="text/javascript" src="model/showreview.js"></script>
        <script type="text/javascript" src="model/showrating.js"></script>
        <style>
            #review_panel_right_reviewMessages{
                width: 98%;
                border:1px black solid;
                height: 250px;
                margin: auto;
                margin-top: 2px;
                overflow:auto;
            }
            span.stars, span.stars span {
                display: block;
                background: url(img/stars.png) 0 -16px repeat-x;
                width: 80px;
                height: 16px;        
            }

            span.stars span {
                background-position: 0 0;
            }
        </style>

    </head>
    <body onload="clear()">
        <?php
        // put your code here
        ?>
        <div class="container-fluid" style="background-color: #122b40; padding: 1px">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <h3 class='thumbnail' style='width: 158px;background:#0f0f0f; color: aliceblue;   padding: 1px;font-weight: bolder'>ReciStaurant</h3>
                    </div>
                    <div class="col-lg-10">
                        <h2 style="color: peachpuff;font-style: italic;font-weight: bolder; margin-top: 20px">Find Nearby Restaurants</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="container form-group" style="background-color: aliceblue; padding: 10px" >
            <form class="form-horizontal" role="form" method="post" onsubmit="return search(this)">
                <div class="row">
                    <div class="col-lg-1">
                    </div>
                    <div class="radio col-lg-6">
                        <label class="radio-inline"><input id="curr" type= "radio" value = "a" name= "search_area" onclick="radiocheck()" >Nearby</label>
                        <label class="radio-inline"><input id="spec" type = "radio" value = "b" name="search_area" onclick="radiocheck()" checked='true'>Other Locations</label>
                    </div>
                    <div class="col-lg-1">
                    </div>
                    <div class="col-lg-4">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <label for="locationpara"></label>
                        <input type="text" class="form-control input-sm" id="locationpara" value="" name="location" placeholder="type in a location">
                        <p class='text-center' id='msg12' style='color:red'></p>
                    </div>
                    <div class="col-lg-3" style="position: relative; top: -5px">
                        <label for="sel1">Select Price Level</label>
                        <select class="form-control input-sm" name='price' id="sel1">
                            <option class="p_level" value='0' selected="true">0</option>
                            <option class="p_level" value='1'>1</option>
                            <option class="p_level" value='2'>2</option>
                            <option class="p_level" value='3'>3</option>
                            <option class="p_level" value='4'>4</option>
                            <option class="p_level" value='5'>5</option>
                        </select>
                    </div>
                    <div class="col-lg-1">
                        <!--button type="submit" class="btn btn-sm btn-primary" name='submit' id='submit'  style="position: relative; top: 19px; background-color: #122b40;border-color: #122b40">Find</button-->
                    </div>
                </div>
                <div class='row' style='margin-top:3px'>
                    <div class='col-lg-1'>
                    </div>
                    <div style="" class='col-lg-5'>
                        <label class="radio-inline"><input class="een" id='uns' type="radio" name='meal_type' value=" " checked="true">unspecified</label>
                        <label class="radio-inline"><input class="een" id='break' type="radio" name='meal_type' value="breakfast">breakfast</label>
                        <label class="radio-inline"><input id='lunc' type="radio" name='meal_type' value="lunch">lunch</label>
                        <label class="radio-inline"><input id='dinn' type="radio" name='meal_type' value="dinner">dinner</label>
                    </div>
                    <div class="col-lg-3">
                        
                    </div>
                    <div class='col-lg-3'>
                        <button type="submit" class="btn btn-sm btn-primary" name='submit' id='submit'  style="background-color: #122b40;border-color: #122b40">Find</button>
                    </div>
                </div>
            </form>

            <div class='row' style=''>
                <div class='col-lg-8' style="">
                    <div id='googleMap' style='height: 500px; margin-top: 10px'>
                    </div>
                </div>
                <div class="col-lg-4" style='background-color: white'>
                    <div id="review_panel_right" style="margin-right: 4px">
                        <div id="review_panel_right_heading" style="background-color: #122b40; color:mintcream "><h4 class="text-center">Users Restaurant Review</h4></div>
                        <div id="review_panel_right_restaurantName" style="color:maroon;font-weight: bold"><h5 class="text-center text-uppercase" id="restaurant_name" ></h5></div>
                        <div id="review_panel_right_restaurantRating" style="color: orangered" class="text-center"><h6 id="restaurant_rating" ><span id="rating" class=""></span></h6></div>
                        <div id="review_panel_right_reviewMessages" class="well"><?php
                            /*                             * for ($index = 0; $index < 1000; $index++) {
                              echo 'hello world';
                              }* */
                            ?></div>



                        <div class="form-group" id="review_panel_right_reviewEntry">
                            <form id="form2" class="form-horizontal" onsubmit="return post(this)" role='form' method="POST">

                                <p id="hint" class="text-center" style="color:royalblue">Enter review here</p>

                                <table id="review_table" cellpadding="2" cellspacing="0" style="margin:auto;"><tr>
                                    <input type = "hidden" name="placeid" id="placeid"/>
                                    <input type = "hidden" name="restaurant_name" id="restaurant_name_1"/>
                                    <td><label>Email:</label></td>
                                    <td><input class="form-control input-sm" id="email" type="email" name="email"></td></tr>
                                    <tr>
                                        <td><label>Name:</label></td>
                                        <td><input class="form-control input-sm" id ="name" type="text" name="name"></td></tr>

                                    <tr><td>Comment:</td>
                                        <td><textarea id="comment" name="review_message" style="float: left;" value="" rows="2px" cols="30px" placeholder="Enter review here"></textarea></td></tr>
                                    <tr>
                                        <td><select class="form-control input-sm" id="rating"name="rating" class="rating">
                                                <option id="ratop" value="" selected>rating</option>
                                                <option value="0.0">0.0</option>
                                                <option value="1.0">1.0</option>
                                                <option value="2.0">2.0</option>
                                                <option value="3.0">3.0</option>
                                                <option value="4.0">4.0</option>
                                                <option value="5.0">5.0</option>
                                            </select></td>
                                        <td style="text-align:right">
                                            <button type="submit" id="review_submit" name="form2" >POST</button></td></tr>
                                </table>
                                <p class="text-center" style="color:royalblue"></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer container-fluid" style="background-color: black;">
            
            <div class="container" style=' height: 215px'>
                <p class='pull-right' style='color:aliceblue'><span>&copy;</span> PAS 2015</p>
            </div>
            <div class="container" style='margin-bottom: 25px'>
            </div>
        </div>
    </body>
</html>
