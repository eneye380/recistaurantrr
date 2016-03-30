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

    </head>
    <body>
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
            <form class="form-horizontal" role="form">
                <div class="row">
                    <div class="col-lg-3">
                    </div>

                    <div class="radio col-lg-3">
                        <label class="radio-inline"><input id="curr" type= "radio" value = "a" name= "search_area" onclick="radiocheck()" >Nearby</label>
                        <label class="radio-inline"><input id="spec" type = "radio" value = "b" name="search_area" onclick="radiocheck()" checked>Other Location</label>
                    </div>
                    <div class="col-lg-3">
                    </div>
                </div>


                <div class="col-lg-8">

                    <label for="locationpara"></label>
                    <input type="text" class="form-control" id="locationpara" value="" name="location" placeholder="type in a location">


                </div>
                <div class="col-lg-4">
                    <button type="button" class="btn btn-primary">Primary</button>
                </div>

            </form>
        </div>

    </body>
</html>
