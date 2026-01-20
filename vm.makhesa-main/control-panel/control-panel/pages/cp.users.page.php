<?php
$internal_page = map_page()[3] ?? false;
if (empty($internal_page)) {
    $internal_page = "dashboard";
}
?>

<div class="wrapper" style="overflow: auto">
    <?php include_once "blade.navbar.sidebar.php"; ?>
    <div class="main-container" id="application_canvas" style="overflow: visible">
        <br><br>
        <div class="main-header anim" style="--delay: 0s; text-align: center; padding: 1rem 3rem; position: inherit;">
            Users
        </div>

        <style>

            .card-container {
                border-radius: 10px;
                padding: 15px;
                margin: 20px;
                display: flex;
                flex-direction: column;
            }

            .card-header {
                display: flex;
                align-items: center;
                padding-bottom: 10px;
                border-bottom: 1px solid #ccc;
            }

            .card-header .img-avatar {
                width: 50px;
                height: 50px;
                border-radius: 50%;
                margin-right: 20px;
                background-color: #333;
            }

            .card-header .text-chat {
                color: black;
                margin: 0;
                font-size: 20px;
            }

            .card-body {
                flex: 1;
                overflow-y: auto;
            }

            .messages-container {
                padding: 15px;
            }

            .message-box {
                padding: 10px;
                margin-bottom: 5px;
                border-radius: 10px;
            }

            .message-box.left {
                background-color: #f1f1f1;
                color: black;
                font-size: 13px;
                left: 0;
            }

            .message-box.right {
                background-color: #333;
                color: #fff;
                font-size: 13px;
                right: 0;
            }

            .message-input {
                padding: 5px;
                border-top: 1px solid #ccc;
            }

            .message-input .message-send {
                width: 100%;
                padding: 10px;
                border: none;
                border-radius: 10px;
                resize: none;
            }

            .message-input .button-send {
                background-color: #333;
                color: #fff;
                padding: 10px 20px;
                border: none;
                cursor: pointer;
                margin-left: 10px;
                border-radius: 10px;
                font-size: 13px;
            }

            .message-input .button-send:hover {
                background-color: #f1f1f1;
                color: #333;
            }
        </style>

        <?php
        @include_once dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . "scripts.php";

        if ($internal_page == "create-user") {
            $html = '
            <div id="section_seo" style="display: contents;">
                <div class="video anim" style="--delay: .4s; margin:0.2rem 0px; ">
                    <div class="video-wrapper"></div>
                    <div class="video-name">
                        <div class="small-header anim" style="--delay: .3s; margin-bottom:0px">
                            <span style="font-size:10px; ">Client Accounts </span><br>
                            Create User Account
                        </div>
                    </div>
                    <div class="video-view" style="padding: 10px 20px 0px;">
                    </div>

                    <div class="video-view" style="padding: 10px 20px 0px;">Account Image</div>
                    <div class="video-name">
                        <div class="search-bar" style="max-width: 100%;">
                            <img src="/@media/Something/">
                        </div>
                    </div>


                    <div class="video-view" style="padding: 10px 20px 0px;">Username</div>
                    <div class="video-name">
                        <div class="search-bar" style="max-width: 100%;">
                            <input placeholder="" type="text" id="edt_username" style="background-image: none; max-width: 100%;">
                        </div>
                    </div>

                    <div class="video-view" style="padding: 10px 20px 0px;">Email</div>
                    <div class="video-name">
                        <div class="search-bar" style="max-width: 100%;">
                            <input placeholder="user@example.com" type="text" id="edt_user_email" style="background-image: none; max-width: 100%;">
                        </div>
                    </div>

                    <div class="video-view" style="padding: 10px 20px 0px;">Password</div>
                    <div class="video-name">
                        <div class="search-bar" style="max-width: 100%;">
                            <input placeholder="**************" type="text" id="edt_user_password" style="background-image: none; max-width: 100%;">
                        </div>
                    </div>

                    <div class="video-view" style="padding: 10px 20px 0px;">Confirm Password</div>
                    <div class="video-name">
                        <div class="search-bar" style="max-width: 100%;">
                            <input placeholder="*************" type="text" id="edt_user_confirm_password" style="background-image: none; max-width: 100%;">
                        </div>
                    </div>
                    
                    
                    
                    <div style="display: flex; flex-direction: row; justify-content: space-between; margin:10px 20px; ">
                        <button onclick="create_user()">Create Account</button>
                    </div>
                    <div class="video-view"></div>
                </div>
            </div>';
            echo $html;
        } else if ($internal_page == "profile") {
            $user_id = map_page()[4] ?? false;
            $sql = "SELECT * FROM `users` WHERE (user_id = {$user_id})";
            $user_data = $db->query($sql);
            if (empty($user_data)) { 
                echo "<div class='error'>Data not found.</div>";
                exit(); 
            }
            //print_r($user_data);
            $user_data = $user_data[0];

            $html = '
            <div id="section_faq" style="display: contents;">
                <div class="video anim" style="--delay: .4s; margin:0.2rem 0px; ">
                    <div class="video-wrapper"></div>
                    <button onclick="delete_faq(`' . $user_data['id'] . '`)">Close Ticket</button>
                    <div class="video-name">
                        <div class="small-header anim" style="--delay: .3s; margin-bottom:0px">
                            <span style="font-size:10px; ">Active Ticket</span><br>
                            Support Ticket
                        </div>
                    </div>
                        <div class="card-container">
                        <div class="card-body">
                            <div class="messages-container">'; 
    
                    $html .= '
                            </div>
                        </div>
                    </div>



                    <div class="video-view" style="padding: 10px 20px 0px;">Message</div>
                    <div class="video-name">
                        <div class="search-bar" style="max-width: 100%; height: auto;">
                            <textarea id="edt_response" placeholder="Your Ticket Response" style="width: 100%; height: 4rem;border: none;background-color: var(--button-bg);border-radius: 8px; font-family: var(--body-font); font-size: 14px; font-weight: 500; padding: 10px 40px 0 16px; box-shadow: 0 0 0 2px rgba(134, 140, 160, 0.02); color: #fff;">' . $user_data['response'] . '</textarea>
                        </div>
                    </div>
                    <div style="display: flex; flex-direction: row; justify-content: space-between; margin:10px 20px; ">
                        <span></span>
                        <button onclick="edit_faq(`' . $user_data['id'] . '`)">Send <img src="/@rescources/icons/paper-plane/" style="width:2rem; height:auto; filter:invert(1); " ></button>
                    </div>
                    <div class="video-view"></div>
                </div>
            </div>';
            echo $html;
        } else {

            $html_template = '
            
                <div class="responsive anim" style=" --delay: .4s;">
                    <div onclick="window.location=`' . __PAGE__ . map_page()[2] . '/profile/[ID]/`" class="video anim" style="--delay: .4s; margin:0.2rem 0px; width:15rem; height:10rem;  ">
                        <div class="video-view">
                            <div class="small-header anim" style="--delay: .3s; margin-bottom:0px;">
                                <span style="font-size:10px; "># [EMAIL] </span><br>
                                <p style="display:flex; margin:0px; padding:0px;">
                                <svg style="width:20px;" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M224 248a120 120 0 1 1 0-240 120 120 0 1 1 0 240zm-30.5 56l61 0c9.7 0 17.5 7.8 17.5 17.5 0 4.2-1.5 8.2-4.2 11.4l-27.4 32 31 115.1 .6 0 34.6-138.5c2.2-8.7 11.1-14 19.5-10.8 61.9 23.6 105.9 83.6 105.9 153.8 0 15.1-12.3 27.4-27.4 27.4L43.4 512c-15.1 0-27.4-12.3-27.4-27.4 0-70.2 44-130.2 105.9-153.8 8.4-3.2 17.3 2.1 19.5 10.8l34.6 138.5 .6 0 31-115.1-27.4-32c-2.7-3.2-4.2-7.2-4.2-11.4 0-9.7 7.8-17.5 17.5-17.5z"/></svg>
                                [USERNAME]
                                </p>
                            </div>
                        </div>
                        <div class="video-view" style="padding: 10px 20px 0px;">
                            [FIRSTNAME] [SECONDNAME]
                        </div>
                        <br><br>
                    </div>
                </div>
            ';

            echo '
                <div class="anim" style="padding: 10px 5px 0px; --delay: .4s;">
                    <div style="display: flex; flex-direction: row-reverse; justify-content: space-between; margin:10px 0px; ">
                        <button onclick="window.location=`' . __PAGE__ . map_page()[2] . '/create-user/' . '`">
                            Create User
                        </button>
                    </div>
                </div>
            '; 
            $sql = "SELECT * FROM `users` ORDER BY `user_id` DESC";
            $user_data = $db->query($sql);
            # Array ( [0] => Array ( [user_id] => 1 [first_name] => hastings [last_name] => mazibeli [email] => mazibeli@gmail.com [username] => the_lost_kid [password_hash] => password_hash [is_active] => active [role] => user [created_at] => 2025-10-22 [updated_at] => 2025-10-22 [img] => empty ) )


                $html = '';
                foreach ($user_data as $_user_) {
                    $html .= str_replace(
                        ['[ID]', '[FIRSTNAME]','[SECONDNAME]','[USERNAME]','[EMAIL]'],
                        [$_user_['user_id'],($_user_['first_name']),($_user_['last_name']),($_user_['username']),$_user_['email']],
                        $html_template
                    );
                }
                $html .= '';
                echo '<div>'.$html."</div>";
        }
        ?>
    </div>
</div>

<?php
#This is an Internal JS Function 

$page_id = hash("sha256", "new-website-page");
?>
<script>
    async function create_user() {
        operate_loader();
        const username = document.getElementById("edt_username").value;
        const user_img = document.getElementById("edt_user_img").value;
        const user_email = document.getElementById("edt_user_email").value;
        const user_password = document.getElementById("edt_user_password").value;
        const user_confirm_password = document.getElementById("edt_confirm_password").value;

        if (question.trim() === "" || response.trim() === "") {
            operate_loader("stop");
            error_feedback('Please fill in both the subject and description fields.');
            return;
        }
        const data = new URLSearchParams();
        data.append('request', 'create-ticket');
        data.append('subject', question);
        data.append('message', response);
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
            console.log(registration_confirmation);
            error_feedback();
            operate_loader('stop');
        }
    }

    async function delete_faq(user_id) {
        operate_loader();

        const data = new URLSearchParams();
        data.append('request', 'delete-faq');
        data.append('id', user_id);

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

    async function edit_faq(user_id) {
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
        data.append('id', user_id);

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