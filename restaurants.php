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
        <div class="container-fluid" style="background-color: #122b40; padding: 10px">
            <h3 class='thumbnail' style='width: 158px;background: #0f0f0f; color: aliceblue;  margin: auto; padding: 1px;font-weight: bolder'>ReciStaurant</h3>
        </div>
        <div class="container" style="background-color: aliceblue; padding: 10px" >
      

            <form class="form-horizontal" role="form">



                <div class="radio form-group">
                    
                        <label class="radio-inline"><input id="curr" type= "radio" value = "a" name= "search_area" onclick="radiocheck()" >My Location</label>
                        <label class="radio-inline"><input id="spec" type = "radio" value = "b" name="search_area" onclick="radiocheck()" checked>Other Location</label>
                            
                    

                </div>
                <div class="col-lg-8 form-group">
                    
                        <label for="locationpara"></label>
                        <input type="text" class="form-control" id="locationpara" value="" name="location" placeholder="start typing">
                        <span class="help-block">Enter Location</span>
                    
                </div>
                <div class="col-lg-4 form-group">
                    
                </div>

            </form>

        </div>

    </body>
</html>
