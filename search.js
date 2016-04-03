/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

counter = 0;
$.fn.stars = function() {
    return $(this).each(function() {
        // Get the value
        var val = parseFloat($(this).html());
        // Make sure that the value is in 0 - 5 range, multiply to get width
        var size = Math.max(0, (Math.min(5, val))) * 16;
        // Create stars holder
        var $span = $('<span />').width(size);
        // Replace the numerical value with stars
        $(this).html($span);
    });
};
function clear() {
    onloadCurrentLocation();
    //loadInputAutocomplete();
    
    
    n = document.getElementsByName('location');
    n[0].value = '';
    document.getElementById('restaurant_name').innerHTML = "";
    document.getElementById("spec").checked = true;
    document.getElementById("locationpara").disabled = false;
    document.getElementById("break").checked = false;
    document.getElementById("lunc").checked = false;
    document.getElementById("dinn").checked = false;
    document.getElementById("uns").checked = true;
    o = document.getElementsByClassName('p_level');
    o[0].selected = true;
}
function radiocheck() {
    document.getElementById('msg12').innerHTML = '';
    
    if (document.getElementById("curr").checked === true)
    {
        p = document.getElementsByName('location');
        p[0].value = '';
        document.getElementById("locationpara").disabled = true;
        findCurrentLocation();
    } else if (document.getElementById("spec").checked === true)
    {
        checkd = true;
        document.getElementById("locationpara").disabled = false;
    }
}

function search(form) {
    document.getElementById('msg12').innerHTML = '';

    meal = '';
    price = 0;
    area = '';
    mySearch = '';

    if (form.price.value === undefined) {
        m = document.getElementsByClassName('p_level');
        for (var i = 0; i < m.length; i++) {
            if ([i].selected) {
                price = Number(m[i].value);
                break;
            }
        }
    } else {
        price = Number(form.price.value);
    }
    if (form.location.value === undefined) {
        z = document.getElementsByName('location');
        mySearch = z[0].value;
    } else {
        mySearch = form.location.value;
    }
    if (form.search_area.value === undefined) {
        y = document.getElementsByName('search_area');
        for (var i = 0; i < y.length; i++) {
            if (y[i].checked) {
                area = y[i].value;
                break;
            }
        }
    } else {
        area = form.search_area.value;
    }
    if (form.meal_type.value === undefined) {
        x = document.getElementsByName('meal_type');
        for (var i = 0; i < x.length; i++) {
            if (x[i].checked) {
                meal = x[i].value;
                break;
            }
        }
    } else {
        meal = form.meal_type.value;
    }
    failmsg = '';
    if (area === 'b') {
        failmsg += validateLocation(form.location.value);
    }
    if (failmsg === '') {
        console.log("******************************");
        sch = new Search(price, meal, area, mySearch);
        console.log(sch.toString());
        console.log('counter - ' + counter);
        console.log("******************************");
        trigger(sch.getKeyword(),sch.getMin(),sch.getMax());
    } else {
        document.getElementById('msg12').innerHTML = failmsg;
    }
    return false;
}

function Search(price, meal, area, mySearch) {
    this.price = price;
    this.searcharea = area;
    this.min = 0;
    this.max = 0;
    this.keyword = meal;
    this.mySearch = mySearch;
    counter++;
    switch (this.price) {
        case 0:
            this.min = 0;
            this.max = 0;
            break;
        case 1:
            this.min = 0;
            this.max = 1;
            break;
        case 2:
            this.min = 1;
            this.max = 1;
            break;
        case 3:
            this.min = 1;
            this.max = 2;
            break;
        case 4:
            this.min = 2;
            this.max = 3;
            break;
        case 5:
            this.min = 3;
            this.max = 4;
            break;
        default:
            console.log("switch error");
            break;
    }

    this.getKeyword = function () {
        return this.keyword;
    };
    this.getMin = function () {
        return this.min;
    };
    this.getMax = function () {
        return this.max;
    };
    this.getArea = function () {
        return this.searcharea;
    };
    this.getMySearch = function () {
        return this.mySearch;
    };
    this.toString = function () {
        var msg = '';
        msg += "{ ";
        msg += "\n{Keyword: " + this.getKeyword() + "}";
        msg += "\n{Max: " + this.getMax() + "}";
        msg += "\n{Min: " + this.getMin() + "}";
        msg += "\n{Search Area: " + this.getArea() + "}";
        msg += "\n{Location: " + this.getMySearch() + "}";
        msg += "\n }";
        return msg;
    };
}

function validateLocation(data) {
    //alert("v3");
    if (data === '') {
        return "please type and select a location";
    }
    else if(/[^,-. a-zA-Z0-9]/.test(data)){
     return " invalid characters";
     }
    else
        return '';
}



$(function() {
    $('span.stars').stars();
});
