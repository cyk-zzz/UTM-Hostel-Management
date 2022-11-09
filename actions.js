var addManagerDiv = "popup-add-manager";
var editManagerDiv = "popup-edit-manager";
var addStudentDiv = "popup-add-student";
var editStudentDiv = "popup-edit-student";
var managerTable = "manager-list-table";
var studentTable = "student-list-table";
var changeRoomDiv = "popup-change-room";
var applicationTable = "applications-list";

function confirmBox(){
    return confirm("Are You Sure?");
}

function openPopupEditForm(divId, rowId, formId){
    let popup = document.getElementById(divId);
    popup.style.display = "block";
    let row = document.getElementById(rowId);

    let form1 = document.getElementById(formId);
    form1.ID.value=row.cells[0].innerText;
    form1.fullname.value=row.cells[1].innerText;
    if (row.cells[2].innerText == "Female"){
        form1.gender.selectedIndex = "1";
    }
    form1.phone.value=row.cells[3].innerText;
    form1.email.value=row.cells[4].innerText;
    form1.username.value=row.cells[5].innerText;
    form1.password.value=row.cells[6].innerText;
}

function openPopupAddForm(divId){
    let popup = document.getElementById(divId);
    popup.style.display = "block";
}

function closePopupForm(divId){
    var popup = document.getElementById(divId);
    popup.style.display = "none";
}

// both manager list and student list have same columns
function addUser(divId, formId,tableId){
    
    // get data from submitted form, later change
    var form = document.getElementById(formId);
    var inputs = form.elements;
    var dataIn = [];
    // 5 inputs
    for(let i=0; i<5;i++){
        dataIn[i] = inputs[i].value;
        if(dataIn[i] == "Male"){
            dataIn[i] = "L";
        }
        else if(dataIn[i] == "Female"){
            dataIn[i] = "P";
        }
    }
    
    let table = document.getElementById(tableId);
    let row = table.insertRow(-1);


    // set row id based on roles
    if (divId == addManagerDiv){
        row.id = "manager"+(table.rows.length-1);
    }
    else if(divId == addStudentDiv){
        row.id = "student"+(table.rows.length-1);
    }
    

    const totalCol = table.rows[0].cells.length;
    for(let i=0; i<totalCol; i++){
        let cell = row.insertCell(-1);
        if(i == 0){
            cell.innerHTML = table.rows.length-1;
        }
        else if(i == 1){
            cell.innerHTML = "unique no";
        }
        else if(i>1 &&i<totalCol-1){
            cell.innerHTML = dataIn[i-2];
        }
        else{
            let but1 = document.createElement("button");
            let but2 = document.createElement("button");
            but1.classList.add('action-button', 'save-button');
            but1.innerHTML = "<i class='fa-solid fa-pen-to-square'></i>";
            but1.title = "Edit";
            but2.classList.add('action-button', 'cancel-button');
            but2.innerHTML = "<i class='fa-solid fa-trash'></i>";
            but2.title = "Delete";
            
            //get editUser div, later change in php
            if(divId == addManagerDiv){
                // open edit popup form
                but1.onclick = function(){ openPopupForm(editManagerDiv,row.id);}
            }
            else if(divId == addStudentDiv){
                // open edit popup form
                but1.onclick = function(){ openPopupForm(editStudentDiv,row.id);}
            }
            
            // delete user
            but2.onclick = function(){ deleteUser(row.id); }
    
            
            cell.appendChild(but1);
            cell.appendChild(but2);
            
        }
    }

    // call closePopupForm function
    closePopupForm(divId);
    
}

function createPDF(table){
    var tableBody = document.getElementById(table).innerHTML;
    var style = "<style>";
    style += "table {width: 100%;}";
    style += "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
    style += "padding: 2px 3px;text-align: center;}";
    style += "th { background-color: darkblue; color: white;}"
    style += "</style>";

    //create window object
    var win = window.open('','', 'height=700,width=700');
    win.document.write('<html><head>');
    win.document.write('<title>Report</title>');   // <title> FOR PDF HEADER.
    win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
    win.document.write('</head>');
    win.document.write('<body>');
    win.document.write(tableBody);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
    win.document.write('</body></html>');

    win.document.close(); 	// CLOSE THE CURRENT WINDOW.

    win.print();    // PRINT THE CONTENTS.   
}

function validateLogin(){
    var user = document.forms['loginForm']['username'];
    var userVal = user.value;
    var pass = document.forms['loginForm']['password'];
    var passVal = pass.value;

    var userTest = /\b[a-z]{4,20}\b/;

    if(!userTest.test(userVal)){
        alert('Invalid Username');
        user.focus();
        return false;
    }

    return true;
}

// !userVal.match(userTest)
// !userTest.test(userVal)
// .test is more efficient

function validateProfile(){
    var fullname = document.forms['profile']['fullname'];
    var fullnameVal = fullname.value;
    var user = document.forms['profile']['username'];
    var userVal = user.value;
    var pass = document.forms['profile']['password'];
    var passVal = pass.value;
    var email = document.forms['profile']['email'];
    var emailVal = email.value;

    var fullnameTest = /\b[a-zA-Z]{1,30}\b/;
    var userTest = /\b[a-z]{4,20}\b/;
    var passwordTest = /\b[\w]{8,30}\b/;
    var emailTest = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    if (!fullnameTest.test(fullnameVal)){
        alert('Full name must be letters with 1-50');
        fullname.focus();
        return false;
    }
    else if(!userTest.test(userVal)){
        alert('Username must be lowercase with 4-20 letters');
        user.focus();
        return false;
    }
    else if(!passVal.match(passwordTest)){
        alert('Password length must be between 8-30 with letters or digits');
        pass.focus();
        return false;
    }
    else if(!emailTest.test(emailVal)){
        alert('Invalid Email');
        return false;
    }

    return true;
}

function sortReport() {
    var sortBy = document.getElementById('sortBy').value;
    var sortOrder = document.getElementById('sortOrder').value;
    var table1 = document.getElementById('applicationReport');
    var last = table1.rows.length - 1;
    var rw = table1.rows;

    for (var i = 1; i <= last; i++) {
        for (var j = 1; j <= last - i; j++) {
            if (sortOrder == 0) {
                if (rw[j].cells[sortBy].innerText > rw[j + 1].cells[sortBy].innerText) {
                    rw[j].parentNode.insertBefore(rw[j + 1], rw[j]);
                }
            }
            else {
                if (rw[j].cells[sortBy].innerText < rw[j + 1].cells[sortBy].innerText) {
                    rw[j].parentNode.insertBefore(rw[j + 1], rw[j]);
                }
            }
        }
    }
}

function sortApplication() {
    var sortBy = document.getElementById('sortBy').value;
    var sortOrder = document.getElementById('sortOrder').value;
    var table1 = document.getElementById('manager-applications-list');
    var last = table1.rows.length - 1;
    var rw = table1.rows;

    for (var i = 1; i <= last; i++) {
        for (var j = 1; j <= last - i; j++) {
            if (sortOrder == 0) {
                if (rw[j].cells[sortBy].innerText > rw[j + 1].cells[sortBy].innerText) {
                    rw[j].parentNode.insertBefore(rw[j + 1], rw[j]);
                }
            }
            else {
                if (rw[j].cells[sortBy].innerText < rw[j + 1].cells[sortBy].innerText) {
                    rw[j].parentNode.insertBefore(rw[j + 1], rw[j]);
                }
            }
        }
    }
}

function sortCollegeAdmin() {
    var sortBy = document.getElementById('sortBy').value;
    var sortOrder = document.getElementById('sortOrder').value;
    var table1 = document.getElementById('collegeAdmin');
    var last = table1.rows.length - 1;
    var rw = table1.rows;

    for (var i = 1; i <= last; i++) {
        for (var j = 1; j <= last - i; j++) {
            if (sortOrder == 0) {
                if (rw[j].cells[sortBy].innerText > rw[j + 1].cells[sortBy].innerText) {
                    rw[j].parentNode.insertBefore(rw[j + 1], rw[j]);
                }
            }
            else {
                if (rw[j].cells[sortBy].innerText < rw[j + 1].cells[sortBy].innerText) {
                    rw[j].parentNode.insertBefore(rw[j + 1], rw[j]);
                }
            }
        }
    }
}

function sortManagerList() {
    var sortBy = document.getElementById('sortBy').value;
    var sortOrder = document.getElementById('sortOrder').value;
    var table1 = document.getElementById('manager-list-table');
    var last = table1.rows.length - 1;
    var rw = table1.rows;

    for (var i = 1; i <= last; i++) {
        for (var j = 1; j <= last - i; j++) {
            if (sortOrder == 0) {
                if (rw[j].cells[sortBy].innerText > rw[j + 1].cells[sortBy].innerText) {
                    rw[j].parentNode.insertBefore(rw[j + 1], rw[j]);
                }
            }
            else {
                if (rw[j].cells[sortBy].innerText < rw[j + 1].cells[sortBy].innerText) {
                    rw[j].parentNode.insertBefore(rw[j + 1], rw[j]);
                }
            }
        }
    }
}

function sortStudentList() {
    var sortBy = document.getElementById('sortBy').value;
    var sortOrder = document.getElementById('sortOrder').value;
    var table1 = document.getElementById('student-list-table');
    var last = table1.rows.length - 1;
    var rw = table1.rows;

    for (var i = 1; i <= last; i++) {
        for (var j = 1; j <= last - i; j++) {
            if (sortOrder == 0) {
                if (rw[j].cells[sortBy].innerText > rw[j + 1].cells[sortBy].innerText) {
                    rw[j].parentNode.insertBefore(rw[j + 1], rw[j]);
                }
            }
            else {
                if (rw[j].cells[sortBy].innerText < rw[j + 1].cells[sortBy].innerText) {
                    rw[j].parentNode.insertBefore(rw[j + 1], rw[j]);
                }
            }
        }
    }
}

function validateEditManager(){
    var fullname = document.forms['edit-manager']['fullname'];
    var fullnameVal = fullname.value;
    var user = document.forms['edit-manager']['username'];
    var userVal = user.value;
    var pass = document.forms['edit-manager']['password'];
    var passVal = pass.value;
    var email = document.forms['edit-manager']['email'];
    var emailVal = email.value;
    var phone = document.forms['edit-manager']['phone'];
    var phoneVal = phone.value;

    var fullnameTest = /\b[a-zA-Z]{1,30}\b/;
    var userTest = /\b[a-z]{4,20}\b/;
    var passwordTest = /\b[\w]{8,30}\b/;
    var phoneTest = /\b[\d]{10,11}\b/;
    var emailTest = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    if (!fullnameTest.test(fullnameVal)){
        alert('Full name must be letters with 1-50');
        return false;
    }
    else if(!userTest.test(userVal)){
        alert('Username must be lowercase with 4-20 letters');
        return false;
    }
    else if(!passVal.match(passwordTest)){
        alert('Password length must be between 8-30 with letters or digits');
        return false;
    }
    else if(!phoneTest.test(phoneVal)){
        alert('Invalid Phone Number');
        return false;
    }
    else if(!emailTest.test(emailVal)){
        alert('Invalid Email');
        return false;
    }

    return true;
}

function validateEditAdmin(formID){
    var fullname = document.forms[formID]['fullname'];
    var fullnameVal = fullname.value;
    var user = document.forms[formID]['username'];
    var userVal = user.value;
    var pass = document.forms[formID]['password'];
    var passVal = pass.value;
    var email = document.forms[formID]['email'];
    var emailVal = email.value;
    var phone = document.forms[formID]['phone'];
    var phoneVal = phone.value;

    var fullnameTest = /\b[a-zA-Z]{1,30}\b/;
    var userTest = /\b[a-z]{4,20}\b/;
    var passwordTest = /\b[\w]{8,30}\b/;
    var phoneTest = /\b[\d]{10,11}\b/;
    var emailTest = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    if (!fullnameTest.test(fullnameVal)){
        alert('Full name must be letters with 1-50');
        return false;
    }
    else if(!userTest.test(userVal)){
        alert('Username must be lowercase with 4-20 letters');
        return false;
    }
    else if(!passVal.match(passwordTest)){
        alert('Password length must be between 8-30 with letters or digits');
        return false;
    }
    else if(!phoneTest.test(phoneVal)){
        alert('Invalid Phone Number');
        return false;
    }
    else if(!emailTest.test(emailVal)){
        alert('Invalid Email Format');
        return false;
    }

    return true;
}