$(document).ready(function() {

    $('#loginForm').on('submit', function(){
        
            var msg = {error: false, msg: []};
            
            var name = $.trim($('#username').val());
            var pass = $.trim($('#password').val());
            
            if(name == ""){
                msg.error = true;
                msg.msg.push('Username is required.');
            }
            if(pass == ""){
                msg.error = true;
                msg.msg.push('Password is required.');
            }
            
            if(msg.error){
                showMessage(msg.msg);
                return false;
            }
            return true;
    });
	
});



/**
 * 
 * @param {array} msg
 * @returns {void}
 */
function showMessage(msg){
    var $container = $('#forErrors');
    $container.addClass('alert alert-danger');
    $container.empty();
    for(var i=0; i < msg.length; i++){
        $container.append('<p>'+msg[i]+'</p>');
    }
}