var orderform = document.getElementById('orderform');
var myprofile = document.getElementById('myprofile');
var request = document.getElementById('request');
var editdata = document.getElementById('editdata');
var orders = document.getElementById('orders');
var changepass = document.getElementById('changepass');


function show_orderform() {
    orderform.style.display = "block";
    myprofile.style.display = "none";
    request.style.display = "none";
    editdata.style.display = "none";
    orders.style.display = "none";
    changepass.style.display = "none";

}

function show_myprofile() {
    myprofile.style.display = "block";
    request.style.display = "none";
    orderform.style.display = "none";
    editdata.style.display = "none";
    orders.style.display = "none";
    changepass.style.display = "none";



}

function show_request() {
    request.style.display = "block";
    orderform.style.display = "none";
    myprofile.style.display = "none";
    editdata.style.display = "none";
    orders.style.display = "none";
    changepass.style.display = "none";


}

function show_editdata() {
    editdata.style.display = "block";
    orderform.style.display = "none";
    myprofile.style.display = "none";
    request.style.display = "none";
    orders.style.display = "none";
    changepass.style.display = "none";


}

function show_orders() {
    orders.style.display = "block";
    editdata.style.display = "none";
    orderform.style.display = "none";
    myprofile.style.display = "none";
    request.style.display = "none";
    changepass.style.display = "none";

}

function changepassword() {
    changepass.style.display = "block";
    orders.style.display = "none";
    editdata.style.display = "none";
    orderform.style.display = "none";
    myprofile.style.display = "none";
    request.style.display = "none";
}