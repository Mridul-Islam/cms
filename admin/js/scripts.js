$(document).ready(function(){

    // Editor ckEditor
    ClassicEditor
    .create( document.querySelector( '#body' ) )
    .catch( error => {
        console.error( error );
    } );


    // Rest of the code


    // select all check boxes code in view all post
    $('#selectAllBoxes').click(function(event){
        if(this.checked){
            $('.checkBoxes').each(function(){
                this.checked = true;
            });
        }
        else{
            $('.checkBoxes').each(function(){
                this.checked = false;
            });
        }

    });


    // show loader admin

    var div_box = "<div id='load-screen'><div id='loading'>  </div></div>";
    $("body").prepend(div_box);

    $('#load-screen').delay(700).fadeOut(600, function(){
        $(this).remove();
    })



});


function loadUsersOnline(){
    $.get("function.php?onlineusers=result", function(data){
        $(".usersonline").text(data);
    });
}

setInterval(function(){
    loadUsersOnline();
}, 500);




