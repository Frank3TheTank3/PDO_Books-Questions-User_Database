
toggleCloseAll();


function toggleAddBooks()
{
    var element = document.getElementById('addbook');
    element.classList.remove('d-none');
    
    var element = document.getElementById('addquestion');
    element.classList.add('d-none');

    var element = document.getElementById('adduser');
    element.classList.add('d-none');

    var element = document.getElementById('buttonmenu');
    element.classList.remove('d-none');


}

function toggleAddQuestion()
{
    var element = document.getElementById('addbook');
    element.classList.add('d-none');
    
    var element = document.getElementById('addquestion');
    element.classList.remove('d-none');

    var element = document.getElementById('adduser');
    element.classList.add('d-none');

    var element = document.getElementById('buttonmenu');
    element.classList.remove('d-none');


}

function toggleAddUser()
{
    var element = document.getElementById('addbook');
    element.classList.add('d-none');
    
    var element = document.getElementById('addquestion');
    element.classList.add('d-none');

    var element = document.getElementById('adduser');
    element.classList.remove('d-none');

    var element = document.getElementById('buttonmenu');
    element.classList.remove('d-none');


}

function toggleCloseAll()
{
    var element = document.getElementById('addbook');
    element.classList.add('d-none');

    var element = document.getElementById('addquestion');
    element.classList.add('d-none');

    var element = document.getElementById('adduser');
    element.classList.add('d-none');

    var element = document.getElementById('buttonmenu');
    element.classList.add('d-none');


}

function showButtonMenu(){

    var element = document.getElementById('buttonmenu');
    element.classList.remove('d-none');
    hideContact();

}


function hideButtonMenu(){

    var element = document.getElementById('buttonmenu');
    element.classList.add('d-none');
    hideContact();
    toggleCloseAll();

}


function showContact(){
    toggleCloseAll();
    var element = document.getElementById('contact');
    element.classList.remove('d-none');

}


function hideContact(){

    var element = document.getElementById('contact');
    element.classList.add('d-none');

}