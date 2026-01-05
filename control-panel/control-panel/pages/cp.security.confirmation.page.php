<?php @$e = set_page("Account Verification") ?? false; ?>

<?php
#Confirmation Of User Code 
$cliet_data = [
    "email" => "",
    "username" => "",
];
?>

<style>
    .opt-container {
        text-align: center;
    }

    .otp-input {
        display: flex;
        justify-content: center;
        margin-bottom: 1rem;
    }

    .otp-input .digit-input {
        width: 40px;
        height: 40px;
        margin: 0 5px;
        text-align: center;
        font-size: 1.2rem;
        border: 1px solid #444;
        border-radius: 4px;
        background-color: #2a2a2a;
        color: #ffffff;
    }

    .otp-input .digit-input::-webkit-outer-spin-button,
    .otp-input .digit-input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .otp-input .digit-input[type=number] {
        -moz-appearance: textfield;
    }

    button {
        color: white;
        border: none;
        padding: 10px 20px;
        font-size: 1rem;
        border-radius: 4px;
        cursor: pointer;
        margin: 5px;
    }

    button:disabled {
        background-color: #cccccc;
        color: #666666;
        cursor: not-allowed;
    }

    #timer {
        font-size: 1.2rem;
        margin-bottom: 1rem;
        color: #ff9800;
    }
</style>
<div class="moadal-full-page">
    <div style="margin:1rem">
        <div class="main-blog anim"
            style="--delay: 0.1s; max-width:25rem; margin: 15vh auto;background: #42414c;/* margin: 1rem; */">

            <img src="<?php echo (__PROTOCOL__ . __DOMAIN_NAME__); ?>/@rescources/site/favicon/" class="anim"
                style="max-width: 11rem; display: block; margin: auto; padding: 1rem; filter:invert(1);">

            <div class="opt-container">
                <h1>OTP Verification</h1>
                <p style="font-size: 10px; max-width: fit-content; margin: 1px 5px 20px 5px;">An OTP was sent to your
                    email address. Please Confirm This is your.</p>
                <div id="timer">Time remaining: 1:00</div>
                <div class="otp-input">
                    <input class="digit-input" type="number" min="0" max="9" required>
                    <input class="digit-input" type="number" min="0" max="9" required>
                    <input class="digit-input" type="number" min="0" max="9" required>
                    <input class="digit-input" type="number" min="0" max="9" required>
                    <input class="digit-input" type="number" min="0" max="9" required>
                    <input class="digit-input" type="number" min="0" max="9" required>
                </div>

                <div style="display: flex;">
                    <button onclick="verifyOTP()">Verify</button>
                    <button id="resendButton" onclick="resendOTP()" disabled>Resend Code</button>
                </div>
            </div>

            <div class="anim" style="font-size: 10px; max-width: fit-content; margin: 1px 5px 20px 5px;">
                <br>
            </div>

            <div class="main-blog__time">Security Authentication</div>
        </div>
    </div>
</div>


<script>

    async function account_verification(digits) {
        let server_endpoint = "<?php echo __PROTOCOL__ . __DOMAIN_NAME__ . '/@scripts/scripts.php'; ?>";
        const signInData = {
            otp: digits,
        };

        operate_loader();
        const data = new URLSearchParams();
        data.append('mode', 'authenticate');
        data.append('otp_code', digits);
        data.append('request', 'confirm-account');
        let registration_confirmation = await sendAndReceiveData(data, server_endpoint);

        console.log(registration_confirmation);
        try {
            registration_confirmation = JSON.parse(registration_confirmation);
            operate_loader('stop');
            if (registration_confirmation.success) {
                window.location = "<?php echo __PAGE__; ?>";
            } else {
                error_feedback(registration_confirmation.message);
            }
        } catch (error) {
            error_feedback(registration_confirmation);
            operate_loader('stop');
        }

    }




    const inputs = document.querySelectorAll('.otp-input input');
    const timerDisplay = document.getElementById('timer');
    const resendButton = document.getElementById('resendButton');
    let timeLeft = 60; // 3 minutes in seconds
    let timerId;

    function startTimer() {
        timerId = setInterval(() => {
            if (timeLeft <= 0) {
                clearInterval(timerId);
                timerDisplay.textContent = "Code expired";
                resendButton.disabled = false;
                inputs.forEach(input => input.disabled = true);
            } else {
                const minutes = Math.floor(timeLeft / 60);
                const seconds = timeLeft % 60;
                timerDisplay.textContent = `Time remaining: ${minutes}:${seconds.toString().padStart(2, '0')}`;
                timeLeft--;
            }
        }, 1000);
    }

    function resendOTP() {
        // Here you would typically call your backend to resend the OTP
        alert("New OTP sent!");
        timeLeft = 60;
        inputs.forEach(input => {
            input.value = '';
            input.disabled = false;
        });
        resendButton.disabled = true;
        inputs[0].focus();
        clearInterval(timerId);
        startTimer();
    }

    inputs.forEach((input, index) => {
        input.addEventListener('input', (e) => {
            if (e.target.value.length > 1) {
                e.target.value = e.target.value.slice(0, 1);
            }
            if (e.target.value.length === 1) {
                if (index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }
            }
        });

        input.addEventListener('keydown', (e) => {
            if (e.key === 'Backspace' && !e.target.value) {
                if (index > 0) {
                    inputs[index - 1].focus();
                }
            }
            if (e.key === 'e') {
                e.preventDefault();
            }
        });
    });

    function verifyOTP() {
        const otp = Array.from(inputs).map(input => input.value).join('');
        if (otp.length === 6) {
            if (timeLeft > 0) {
                account_verification(otp);
                // Here you would typically send the OTP to your server for verification
            } else {
                error_feedback('OTP has expired. Please request a new one.');
            }
        } else {
            error_feedback('Please enter a 6-digit OTP');
        }
    }

    startTimer();
</script>