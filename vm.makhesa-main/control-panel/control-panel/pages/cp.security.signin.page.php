<div class="moadal-full-page" style="transition:none;">
    <div style="margin:1rem">
        <div class="main-blog anim"
            style="--delay: 0.1s; max-width:25rem; margin: 15vh auto;background: #42414c;/* margin: 1rem; */">

            <img src="<?php echo _rescource_( (__PROTOCOL__ . __DOMAIN_NAME__) .'/@rescources/site/varsitymarket-technologies/'); ?>" class="anim"
                style="max-width: 8rem; display: block; margin: auto; padding: 1rem;">

            <div class="main-blog__title" style="text-align: center; width:100%; max-width: fit-content; margin: auto;">
                Control Panel Locked
            </div>

            <div class="anim" style="font-size: 10px; max-width: fit-content; margin: 1px 5px 20px 5px;">
                To gain Access to your website control panel. Please login to your Trading Pivot to gain access.
                <br>
            </div>

            <div class="anim" style="--delay: .4s; background:inherit; margin-bottom: 1.5rem;">
                <div class="video-view" style="padding: 10px 20px 0px; background:inherit; ">Username</div>
                <div class="video-name" style="background:inherit">
                    <div class="search-bar">
                        <input type="text" placeholder="Username" id="edt_username">
                    </div>
                </div>

                <div class="video-view" style="padding: 10px 20px 0px; background:inherit; ">Password</div>
                <div class="video-name" style="background:inherit">
                    <div class="search-bar">
                        <input type="password" placeholder="Password" id="edt_password">
                    </div>
                </div>

                <button onclick="authenticate_security()" style="margin: 1rem auto; display: block;">
                    Login
                </button>
            </div>
  
            <div class="main-blog__time">Security Authentication</div>
        </div>
    </div>
</div>

<script>
    async function authenticate_security() {
        let edt_username = document.getElementById('edt_username').value;
        let edt_password = document.getElementById('edt_password').value;
        let server_endpoint = "<?php echo __PROTOCOL__ . __DOMAIN_NAME__ . '/@scripts/scripts.php'; ?>";
        const signInData = {
            username: edt_username,
            password: edt_password,
            email: 'genetics@domiain.com',
        };
        if (validateSignInData(signInData)) {
            operate_loader();
            const data = new URLSearchParams();
            data.append('mode', 'authenticate');
            data.append('authenticate_username', edt_username);
            data.append('authenticate_password', edt_password);
            data.append('request', 'connect-user');
            let registration_confirmation = await sendAndReceiveData(data, server_endpoint);

            console.log(registration_confirmation);
            try {
                registration_confirmation = JSON.parse(registration_confirmation);
                operate_loader('stop');

                if (registration_confirmation.authentication){
                    let pack = registration_confirmation.source; 
                    window.location = "<?php echo __PAGE__; ?>"+pack; 
                }

                if (registration_confirmation.confirmation){
                    window.location = "<?php echo __PAGE__; ?>confirm-account/"; 
                }
                
                if (registration_confirmation.success) {
                    window.location = "<?php echo __PAGE__; ?>";
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