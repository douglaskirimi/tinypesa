 $("#phone").on('keydown keyup change blur focusout', function(){
                    var phone = $(this).val();
                    var phone_Length = $(this).val().length;
                      if(phone_Length <= 0) {
                        $('#phone_check').text('Kindly provide your phone number');
                        $('#phone_check').css('color','red');
                        $('#phone').css('border','1px solid red');                       
                   }
                   else if(isNaN(phone)) {
                        $('#phone_check').text('Phone Number can include numbers ONLY');
                        $('#phone_check').css('color','red'); 
                        $('#phone').css('border','none');                         
                   }
                   else if(phone_Length < 10) {
                        $('#phone_check').text('Phone Number Must be at least 10 characters');
                        $('#phone_check').css('color','red');
                        $('#phone').css('border','none');                         
                   }
                   else{
                        $('#phone_check').text('');
                        $('#phone_check').css('color','limegreen');  
                        $('#phone').css('border','none');                             
                   }
               })    