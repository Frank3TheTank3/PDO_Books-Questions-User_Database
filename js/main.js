
let hasBeenClick = false;
function ClickMe()
{
    if(hasBeenClick === false)
    {

    var elem = document.getElementById("print");
    elem.innerText = 'Button has been clicked!';
    hasBeenClick = true;

    }
    else if(hasBeenClick === true)
    {
        var elem = document.getElementById("print");
        elem.innerText = 'Toogle';
        hasBeenClick = false;


    }
}
toggleCloseAll();





function toggleAddBooks()
{
    var element = document.getElementById('addbook');
    element.classList.remove('d-none');
    
    var element = document.getElementById('addquestion');
    element.classList.add('d-none');

    var element = document.getElementById('adduser');
    element.classList.add('d-none');


}

function toggleCloseAll()
{
    var element = document.getElementById('addbook');
    element.classList.add('d-none');
    
    var element = document.getElementById('addquestion');
    element.classList.add('d-none');

    var element = document.getElementById('adduser');
    element.classList.add('d-none');


}