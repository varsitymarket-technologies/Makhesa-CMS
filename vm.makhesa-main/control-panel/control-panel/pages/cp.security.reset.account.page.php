<?php @$e = set_page("Sign Up") ?? false; ?>

<div class="moadal-full-page">
    <div style="margin:1rem">
        <div class="main-blog anim" style="--delay: 0.1s; max-width:25rem; margin: 15vh auto;background: #42414c;/* margin: 1rem; */">

            <img src="<?php echo(__PROTOCOL__.__DOMAIN_NAME__); ?>/@rescources/site/favicon/" class="anim" style="max-width: 11rem; display: block; margin: auto; padding: 1rem; filter:invert(1);">

            <div class="main-blog__title" style="text-align: center; width:100%; max-width: fit-content; margin: auto;">
                Reset Password 
            </div>

            <div class="anim" style="font-size: 10px; max-width: fit-content; margin: 1px 5px 20px 5px;">
                A reset password token Will be sent to your device.
                <br>
            </div>

            <div class="anim" style="--delay: .4s; background:inherit; margin-bottom: 1.5rem;">

                <div class="video-view" style="padding: 10px 20px 0px; background:inherit; ">Your Email Address</div>
                <div class="video-name" style="background:inherit">
                    <div class="search-bar">
                        <input type="email" placeholder="Email Address" id="edt_email_address">
                    </div>
                </div>

                <button onclick="()" style="margin: 1rem auto; display: block;">
                    Reset Password
                </button>
            </div>

        
            <div class="main-blog__time">Security Authentication</div>
        </div>
    </div>
</div>


<script>
    
  async function create_registration() {

    let edt_username = document.getElementById('edt_username').value;
    let edt_password = document.getElementById('edt_password').value;
    let edt_email = document.getElementById("edt_email").value;
    let edt_conf = document.getElementById("edt_password_confirm").value; 

    let server_endpoint = "<?php echo __PROTOCOL__ . __DOMAIN_NAME__ . '/@scripts/scripts.php'; ?>"; 

    const signInData = {
      username: edt_username,
      password: edt_password,
      email: edt_email,
      password_confirm: edt_conf,
    };

    if (validateSignInData(signInData)) {
      operate_loader();
      const data = new URLSearchParams();
      data.append('mode', 'authenticate');
      data.append('authenticate_username', edt_username);
      data.append('authenticate_email', edt_email);
      data.append('authenticate_password', edt_password);
      data.append('authenticate_confirm_password', edt_conf);
      
      data.append('request', 'create-user');
      let registration_confirmation = await sendAndReceiveData(data, server_endpoint);

      console.log(registration_confirmation);
      try {
            registration_confirmation = JSON.parse(registration_confirmation);
            operate_loader('stop');
            if (registration_confirmation.success) {
                window.location = "<?php echo __PAGE__; ?>/confirm-account/";
            } else {
                error_feedback(registration_confirmation.message);
            }
      } catch (error) {
        console.error(registration_confirmation);
        error_feedback(registration_confirmation);
        operate_loader('stop');
      }
    };
     
  }


</script>