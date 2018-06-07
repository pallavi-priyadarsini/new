
$(document).ready(function() {
    $('#form').submit(function(e) {
        e.preventDefault();

        var obj = {
            name: {
                firstname: $('input#firstname').val(),
                lastname: $('input#lastname').val(),
            },

        
            email: $('input#email').val(),
          
            password: $('input#password').val(),
        }
        alert('Thank You');
        console.log(obj);
    });
});
    
