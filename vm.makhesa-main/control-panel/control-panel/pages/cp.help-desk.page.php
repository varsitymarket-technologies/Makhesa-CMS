<?php
$internal_page = map_page()[3] ?? false;
if (empty($internal_page)) {
    $internal_page = "dashboard";
}
?>

<style>
    button{
        margin: auto; 
    }
</style>

<div class="wrapper" style="overflow: auto">
    <?php include_once "blade.navbar.sidebar.php"; ?>
    <div class="main-container" id="application_canvas" style="overflow: visible">
                <div style="padding: 2rem;">
        </div>
        <div
            style="background: #0000006b;padding: 1rem 2rem 3rem 2rem;border-radius: 2rem;border-style: solid;border-color: #242424;">
            <div class="small-header" style=" margin-bottom:0px">
                <span style="font-size:10px; ">Welcome To the</span><br>
                Help Desk
            </div>
            <br><span class="" style="font-size: 10px;">This is the dedicated page for customer support and technical assistance.</span>
        </div>
        <br>

                <div class="main-header anim" style="--delay: 0s; text-align: center; padding: 1rem 3rem; position: inherit;">
            Customer Support
        </div>

        <div>
            <div class="responsive anim" style="--delay: .4s;">
                <div class="gallery">
                    <div style="background-color: #242424; padding: 10px;">

                        <h1
                            style="display: flex; flex-direction: row; justify-content: center; align-items: center; align-content: space-between;">
                            Contact Forms 
                        </h1>
                        <button onclick="window.location = '<?php echo change_page('users') ?>'">Manage Users</button>
                    </div>
                </div>
            </div>

            <div class="responsive anim" style="--delay: .4s;">
                <div class="gallery">
                    <div style="background-color: #242424; padding: 10px;">

                        <h1
                            style="display: flex; flex-direction: row; justify-content: center; align-items: center; align-content: space-between;">
                            Contact Reports
                        </h1>
                        <button onclick="window.location = '<?php echo change_page('category') ?>'">Manage Passwords</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-header anim" style="--delay: 0s; text-align: center; padding: 1rem 3rem; position: inherit;">
            Customer Management
        </div>

        <div>
            <div class="responsive anim" style="--delay: .4s;">
                <div class="gallery">
                    <div style="background-color: #242424; padding: 10px;">

                        <h1
                            style="display: flex; flex-direction: row; justify-content: center; align-items: center; align-content: space-between;">
                            Users 
                        </h1>
                        <button onclick="window.location = '<?php echo change_page('users') ?>'">Manage Users</button>
                    </div>
                </div>
            </div>

            <div class="responsive anim" style="--delay: .4s;">
                <div class="gallery">
                    <div style="background-color: #242424; padding: 10px;">

                        <h1
                            style="display: flex; flex-direction: row; justify-content: center; align-items: center; align-content: space-between;">
                            Reset Password
                        </h1>
                        <button onclick="window.location = '<?php echo change_page('category') ?>'">Manage Passwords</button>
                    </div>
                </div>
            </div>
        </div>

        <div style="padding: 2rem;">

        </div>
        <div class="main-header anim" style="--delay: 0s; text-align: center; padding: 1rem 3rem; position: inherit;">
        </div>

        <div style="display: contents;">
            <div class="video-name"
                style="background: #0000006b;padding: 1rem 2rem 5rem 2rem;border-radius: 2rem;border-style: solid;border-color: #242424;">
                <div class="small-header anim" style="--delay: .3s; margin-bottom:0px">
                    <span style="font-size:10px; ">Welcome To </span><br>
                    Help Desk
                </div>
                <br><span class="anim"  style="font-size: 10px;">This is the dedicated paage for customer support and technical
                    assistance. </span>
            </div>

            <br>
        </div>
        <div class="main-header anim" style="--delay: 0s; text-align: center; padding: 1rem 3rem; position: inherit;">
           Customer Support
        </div>

        <div>
            
            <div class="responsive anim" style="--delay: .4s;">
                <div class="gallery">
                    <div style="background-color: #242424; padding: 10px;">

                        <h1
                            style="display: flex; flex-direction: row; justify-content: center; align-items: center; align-content: space-between;">
                            <span>

                            </span>
                            Contact Forms
                        </h1>
                        <p>View All The Sent Forms</p>
                        <button onclick="window.location=`<?php echo __PAGE__ ?>contact-form/`">View Page</button>

                    </div>
                </div>
            </div>

            <div class="responsive anim" style="--delay: .4s;">
                <div class="gallery">
                    <div style="background-color: #242424; padding: 10px;">

                        <h1
                            style="display: flex; flex-direction: row; justify-content: center; align-items: center; align-content: space-between;">
                            Users
                        </h1>
                        <p>Manage User Accounts</p>
                        <button onclick="window.location=`<?php echo __PAGE__ ?>users/`">View Page</button>

                    </div>
                </div>
            </div>

            <div class="responsive anim" style="--delay: .4s;">
                <div class="gallery">
                    <div style="background-color: #242424; padding: 10px;">

                        <h1
                            style="display: flex; font-size: 1.5rem; flex-direction: row; justify-content: center; align-items: center; align-content: space-between;">
                            
                            Reset Password
                        </h1>
                        <p>Change Client Passwords</p>
                        <button>View Page</button>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
#This is an Internal JS Function 

$page_id = hash("sha256", "new-website-page");
?>
<script>
    async function add_faq() {
        operate_loader();
        const question = document.getElementById("edt_faq_question").value;
        const response = document.getElementById("edt_response").value;

        if (question.trim() === "" || response.trim() === "") {
            operate_loader("stop");
            error_feedback('Please fill in both the question and response fields.');
            return;
        }
        const data = new URLSearchParams();
        data.append('request', 'create-faq');
        data.append('question', question);
        data.append('response', response);
        let registration_confirmation = await sendAndReceiveData(data, "<?php echo __PROTOCOL__ . __DOMAIN_NAME__ . '/@scripts/scripts.php'; ?>");
        try {
            registration_confirmation = JSON.parse(registration_confirmation);
            operate_loader('stop');
            if (registration_confirmation.success) {
                window.location = "<?php echo __PAGE__ . map_page()[2]; ?>/";
            } else {
                error_feedback(registration_confirmation.message);
            }
        } catch (error) {
            console.error(error);
            error_feedback();
            operate_loader('stop');
        }
    }

    async function delete_faq(faq_id) {
        operate_loader();

        const data = new URLSearchParams();
        data.append('request', 'delete-faq');
        data.append('id', faq_id);

        let registration_confirmation = await sendAndReceiveData(data, "<?php echo __PROTOCOL__ . __DOMAIN_NAME__ . '/scripts/scripts.php'; ?>");
        try {
            registration_confirmation = JSON.parse(registration_confirmation);
            operate_loader('stop');
            if (registration_confirmation.success) {
                window.location = "<?php echo __PAGE__ . map_page()[2]; ?>/";
            } else {
                error_feedback(registration_confirmation.message);
            }
        } catch (error) {
            console.error(error);
            error_feedback();
            operate_loader('stop');
        }
    }

    async function edit_faq(faq_id) {
        operate_loader();
        const question = document.getElementById("edt_faq_question").value;
        const response = document.getElementById("edt_response").value;

        if (question.trim() === "" || response.trim() === "") {
            operate_loader("stop");
            error_feedback('Please fill in both the question and response fields.');
            return;
        }
        const data = new URLSearchParams();
        data.append('request', 'update-faq');
        data.append('question', question);
        data.append('response', response);
        data.append('id', faq_id);

        let registration_confirmation = await sendAndReceiveData(data, "<?php echo __PROTOCOL__ . __DOMAIN_NAME__ . '/@scripts/scripts.php'; ?>");
        try {
            registration_confirmation = JSON.parse(registration_confirmation);
            operate_loader('stop');
            if (registration_confirmation.success) {
                window.location = "<?php echo __PAGE__ . map_page()[2]; ?>/";
            } else {
                error_feedback(registration_confirmation.message);
            }
        } catch (error) {
            console.error(error);
            error_feedback();
            operate_loader('stop');
        }
    }
</script>