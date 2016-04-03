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

    </head>
    <body onload="clear()">
        <?php
        // put your code here
        ?>
        <div class="container-fluid" style="background-color: #122b40; padding: 1px">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <h3 class='thumbnail' style='width: 158px;background: #0f0f0f; color: aliceblue;   padding: 1px;font-weight: bolder'>ReciStaurant</h3>
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
                        <label class="radio-inline"><input id="spec" type = "radio" value = "b" name="search_area" onclick="radiocheck()" checked='true'>Other Location</label>
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
                        <button type="submit" class="btn btn-sm btn-primary" name='submit' id='submit'  style="position: relative; top: 19px; background-color: #122b40;border-color: #122b40">Find</button>
                    </div>
                </div>
                <div class='row' style='margin-top:3px'>
                    <div class='col-lg-1'>
                    </div>
                    <div class='col-lg-5'>
                        <label class="radio-inline"><input class="een" id='uns' type="radio" name='meal_type' value=" " checked="true">unspecified</label>
                        <label class="radio-inline"><input class="een" id='break' type="radio" name='meal_type' value="breakfast">breakfast</label>
                        <label class="radio-inline"><input id='lunc' type="radio" name='meal_type' value="lunch">lunch</label>
                        <label class="radio-inline"><input id='dinn' type="radio" name='meal_type' value="dinner">dinner</label>
                    </div>
                    <div class="col-lg-3">
                    </div>
                    <div class='col-lg-3'>
                    </div>
                </div>
            </form>

            <div class='row' style='margin-top:10px'>
                <div class='col-lg-8' style="">
                    <div id='googleMap' style='height: 500px'>
                    </div>
                </div>
                <div class="col-lg-4" style='background-color: white'>
                    <p id='restaurant_name'></p>
                </div>
            </div>
        </div>


    </body>
</html>
