//alert("post");
function postReview(form) {
//
    alert("p1");
    if (form.email.value == "" || form.review_message.value == "" || form.placeid.value == "" || form.name.value == "" || form.rating.value == "") {
        //alert("1")
        document.getElementById("hint").innerHTML = "please fill empty fields";
        //
        return;
        //
    } else {
        //alert("2")
        var xmlhttp = new XMLHttpRequest();
        //alert("3")		
        xmlhttp.onreadystatechange = function () {
            //	//alert("4")
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                //alert("5")
                document.getElementById("hint").innerHTML = xmlhttp.responseText;
                form.rating.value = " ";
                form.name.value = " ";
                form.review_message.value = " ";
                form.email.value = " ";
                clearform(form);
                //
            }
            //
        }
        //alert("6")
        xmlhttp.open("GET", "insertreview.php?email=" + form.email.value + "&review_message=" + form.review_message.value + "&placeid=" + form.placeid.value + "&name=" + form.name.value + "&rating=" + form.rating.value + "&restaurant_name=" + form.restaurant_name.value, true);
        //alert("7")
        xmlhttp.send();
        //
    }
}
function clearform(form) {
    alert("p2");
    form.rating.value = " ";
    form.name.value = " ";
    form.review_message.value = " ";
    form.email.value = " ";
}

//alert("test1");
function uploadComment(form) {
    //alert("p3");
    var xmlhttp = new XMLHttpRequest();
    //alert("3");	
    xmlhttp.onreadystatechange = function () {
        //alert("4");
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            //alert("5");
            document.getElementById("adminhint").innerHTML = xmlhttp.responseText;
            //
        }
        //
    }
    //alert("6");

    xmlhttp.open("GET", "admininsert.php?admine=" + form.admine.value + "&adminid=" + form.adminid.value, true);
    //alert("7");
    xmlhttp.send();
    //
}
function deleteComment(form) {
    //alert("p3");
    var xmlhttp = new XMLHttpRequest();
    //alert("3");	
    xmlhttp.onreadystatechange = function () {
        //alert("4");
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            //alert("5");
            document.getElementById("adminhint").innerHTML = xmlhttp.responseText;
            //
        }
        //
    }
    //alert("6");

    xmlhttp.open("GET", "admindelete.php?admine=" + form.admine.value + "&adminid=" + form.adminid.value, true);
    //alert("7");
    xmlhttp.send();
    //
}
//alert("test1");
//alert("1");
function post(form) {
    //alert("p4");
    if (form.email.value === "" || form.review_message.value === "" || form.placeid.value === "" || form.name.value === "" || form.rating.value === "") {
        //alert("1");
        console.log("email: " + form.email.value);
        console.log("review: " + form.review_messagevalue);
        console.log("placeid: " + form.placeid.value);
        console.log("name: " + form.name.value);
        console.log("rating: " + form.rating.value);
        document.getElementById("hint").innerHTML = "please fill empty fields";
        //
        return false;
        //
    } else {
        if (/![@.]/.test(form.email.value)) {
            document.getElementById("hint").innerHTML = "please enter a valid email";
            return false;
        }
        //alert("2");
        var url = "/model/insertreview.php";
        var params = "email=" + form.email.value + "&review_message=" + form.review_message.value + "&placeid=" + form.placeid.value + "&name=" + form.name.value + "&rating=" + form.rating.value + "&restaurant_name=" + form.restaurant_name.value;

        var xmlhttp = new XMLHttpRequest();
        //alert("3");		
        xmlhttp.onreadystatechange = function () {
            //alert("4");
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                //alert("5");
                document.getElementById("hint").innerHTML = xmlhttp.responseText;
                document.getElementById("name").value = "";
                document.getElementById("comment").value = "";
                document.getElementById("ratop").selected = true;
                document.getElementById("email").value = "";
                //
                //alert("41")
            }
            //
        }
        xmlhttp.open("POST", url, true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.setRequestHeader("Content-length", params.length);
        xmlhttp.setRequestHeader("Connection", "close");
        //alert("6");

        //alert("7")
        xmlhttp.send(params);
        //


        return false;
    }
}


//alert("test1");
function upload(form) {
    var ur = "admininsert.php";
    var param = "admine=" + form.admine.value + "&adminid=" + form.adminid.value;


    //alert("2")
    var xmlhttp = new XMLHttpRequest();
    //alert("3");	
    xmlhttp.onreadystatechange = function () {
        //alert("4");
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            //alert("5");
            document.getElementById("adminhint").innerHTML = xmlhttp.responseText;
            //
        }
        //
    }
    xmlhttp.open("POST", ur, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.setRequestHeader("Content-length", param.length);
    xmlhttp.setRequestHeader("Connection", "close");

    xmlhttp.send(param);
    //
}

function passwordCheck(form) {
    //alert("p4");
    if (form.password.value === "") {
        //alert("1")
        document.getElementById("adminhint").innerHTML = "please enter password";
        //
        return false;
        //
    } else {
        //alert("2")
        var url = "admin.php";
        var params = "password=" + form.password.value;

        var xmlhttp = new XMLHttpRequest();
        //alert("3")		
        xmlhttp.onreadystatechange = function () {
            //alert("4");
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                //alert("5");
                //document.getElementById("adminhint").innerHTML = xmlhttp.responseText;
                var x = String(xmlhttp.responseText);
                x = x.replace(/\s+/g, '');
                console.log(x === 'ok');
                if (x === 'ok') {
                    location.href = '/model/adminview.php';
                } else if (x === 'notok') {
                    document.getElementById("adminhint").innerHTML = 'password not found';
                }
                //location.href = '/model/adminview.php';
                //alert('e');				//
            }
            //
        };

        xmlhttp.open("POST", url, true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.setRequestHeader("Content-length", params.length);
        xmlhttp.setRequestHeader("Connection", "close");
        //alert("6");

        //alert("7")
        xmlhttp.send(params);
        //
        return false;
    }
}





