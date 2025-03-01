<!-- ****************************************************contact us ***************************** -->
<head>
    <link rel = "stylesheet" href="./assets/CSS/bot.css">


</head>
<script src="./assets/JS/chat.js"></script>
<script src="./assets/JS/responses.js"></script>
<script>

    function contact_us(){
      // console.log(type);
      let name = document.querySelector("#name").value;
      let email = document.querySelector("#email").value;
      let mobile = document.querySelector("#mobile").value;
      let college = document.querySelector("#college").value;
      let message = document.querySelector("#message").value;

    //   let file = document.querySelector("#file").value;
      
            var formData = new FormData();
            formData.append('name', name);
            formData.append('email', email);
            formData.append('mobile', mobile);
            formData.append('college', college);
            formData.append('message', message);

            let checkVal = true;
            // for (const value of formData.values()) {
            //   console.log(value);
            //     if(value=='' || value=='undefined')
            //         $checkVal = false;
            // }.
			if(name=='' || name=='undefined' || email=='' || email=='undefined' || message=='' || message=='undefined')
			{
				checkVal = false;

			}
    
          if(checkVal){

            $.ajax({
                type: "POST",
                url: "./admin/blogAdmin/api.php/?q=contactus",
                data : formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data){
                    alert(data.message);
                    // console.log(data.message);
					// alert("Form Submitted!!");
                    // window.location.replace('./user/');
                    // window.location.replace('../../../../thankyou.php');

                },
                error: function(xhr, status, error){
                    // window.location.reload();
					// alert("Form Submitted!!");
                    alert("Fill in the details");
                },
      	});

        }else{
            // alert("Fill required Fields.");
            console.log();
        }

    };
    function clearChat() {
        const chatContainer = document.getElementById('chatbox','chat-bar-input-block');
  
    // Select all chat messages after the first bot message
        const chatMessages = Array.from(chatContainer.children).slice(2).filter((child) => {
           return !child.classList.contains('bot-message');
        });
  
    // Remove all chat messages after the first bot message
         chatMessages.forEach((message) => {
         message.remove();
        });
    }
  
    function popup() {  
        var coll = document.getElementsByClassName("collapsible");
        for (let i = 0; i < coll.length; i++) {
          coll[i].addEventListener("click", function() {
       
          this.classList.toggle("active");
          var content = this.nextElementSibling;
          if (content.style.maxHeight) {
            content.style.maxHeight = null;
          } else {
            content.style.maxHeight = content.scrollHeight + "px";
          }
     
        },{once : true});
    }
    clearChat() 
    }




    function firstBotMessage() {
        let firstMessage = "Hi there! Welcome to the ACM website. How can I help you today?"
        document.getElementById("botStarterMessage").innerHTML = '<p class="botText"><span>' + firstMessage + '</span></p>';

        const time=getTime();

         $("#chat-timestamp").append(time);
        document.getElementById("userInput").scrollIntoView(false);
    }


  </script>



<div class="dsph" id="contact">
	<div class="d-flex justify-content-center mt-md-5">
		<img src="./assets/images/contact_us_img.webp" class="svg-media" alt="" />
		<div class="contactUs">
			<div class="closebtn">
				<button class="btn btn-primary btn-theme s-form-group contact-btn" onclick="closecontact()"><i class="fas fa-times"></i></button>
			</div>
			<form class="s-form" name="contact" method="POST" onsubmit="return validateform();">
				<h2 class="my-4 display-4 fw-bolder text-center">Contact<span class="text-blue"> Us</span></h2>
				<div class="row form-row">
					<div class="form-group s-form-group col-md-5">
						<input type="text" name="name" id="name" class="form-control" placeholder="Name *" required />
					</div>
					<div class="form-group s-form-group col-md-5">
					<input type="text" name="email" id="email" class="form-control" aria-describedby="emailHelp" placeholder="Email *" required />
					</div>
				</div>
				<div class="row form-row">
					<div class="form-group s-form-group col-md-5">
					<input type="number" name="mobile" id="mobile" class="form-control" placeholder="Phone No." />
				</div>
				<style>
                    input::-webkit-outer-spin-button,
                    input::-webkit-inner-spin-button {
                    -webkit-appearance: none;
                    margin: 0;
                    }
                    input[type=number] {
                    -moz-appearance: textfield;
					}
             	</style>
            
				<div class="form-group s-form-group col-md-5">
					<input type="text" name="college" id="college" class="form-control" placeholder="College/ Organization" />					</div>
				</div>
				<div class="contact-msg">
					<textarea type="text" name="message" id="message" rows="5" placeholder="Message *" class="form-control col-md-11 contact-message" required></textarea>
				</div>
				<div class="row contact-msg">
					<button type="submit" class="btn btn-primary btn-theme s-form-group contact-btn col-md-3 col-sm-2" onclick="contact_us()">Submit</button>
				</div>
      
			</form>
		</div>
	</div>
</div>
    <!-- CHAT BAR BLOCK -->
    <div class="chat-bar-collapsible" id="chatbot" style="z-index:+1 !important;">
        <button id="chat-button" type="button" class="collapsible" onclick="popup()"> <i id="chat-icon" style="color: #005daa;height:2px; width:27px;font-size:30px; margin-left:-10px" class="fas fa-robot" ></i>
           
        </button>

        <div class="Card-content">
            <div class="full-chat-block">
                <!-- Message Container -->
                <div class="outer-container">
                    <div class="chat-container">
                        <!-- Messages -->
                        <div id="chatbox" style="margin-top:13px">
                            <h5 id="chat-timestamp"></h5>
                            <p id="botStarterMessage"  class="botText">Loding...</p>
                            <span class="small-text"></span>
                        </div>

                        <!-- User input box -->


                        <div id="chat-bar-bottom">
                            <p></p>
                        </div>

                    </div>
                </div>

            </div>
            <div class="chat-bar-input-block">
                <div id="userInput">
                    <input id="textInput" class="input-box" type="text" name="msg" placeholder="Tap 'Enter' to send a message" style=" top: 50px; left: 50px;">
                    <p></p>
                                
                </div>


                    <div class="chat-bar-icons">
                        <i id="chat-icon" style="color: #005daa; margin-left:1rem; font-size:25px;" class="fa fa-fw fa-send" onclick="sendButton()"></i>
                    </div>
            </div>
                <script>
                    firstBotMessage()
                    $("#textInput").keypress(function(e) {
                    if (e.which == 13) {
                        getResponse();
                    }
                    });
                    
                </script>
        </div>

    </div>

	<!-- ********************************contact_us end**************************************************** -->
<!-- back to top -->
<div class="scrolltop">
	<div class="scroll icon">
        <i class="fa fa-rocket" aria-hidden="true"></i>
    </div>
</div>
<!-- contact us -->
<div class="contact-bottom-btn">
	<a href="javascript:showcontact()">
		<div class="contact-icon"><i class="fas fa-comments" aria-hidden="true"></i></div>
	</a>
</div>