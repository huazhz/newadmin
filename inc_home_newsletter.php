<!-- SignUp section -->
        <div class="signup purplebg">
        <div class="newsletter-thankyou-msg"><p>Saving..</p></div>
            <div class="row">
            	
                <div class="medium-4 columns">
                    <h2><?=unFormatData($_SETTINGS['home-paragraph-title1-newsletter'])?> </h2>
                    <p><?=unFormatData($_SETTINGS['home-paragraph-title2-newsletter'])?></p>
                </div>
                <form action="" onsubmit="return signUpForm()">
                    <div class="medium-2 columns"><input required type="text" id="nl-fname" placeholder="First Name"/></div>
                    <div class="medium-2 columns"><input required type="text" id="nl-lname" placeholder="Last Name"/></div>
                    <div class="medium-2 columns"><input required type="email" id="nl-email" placeholder="Email"/></div>
                    <div class="medium-2 columns"><button type="submit" class=" button bluebg">Sign Up</button></div>
                </form>        
            </div>
        </div>
<!-- End SignUp section -->