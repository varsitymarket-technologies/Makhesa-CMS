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
            Support Services
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

        if ($internal_page == "create-ticket") {
            $html = '
            <div id="section_seo" style="display: contents;">
                <div class="video anim" style="--delay: .4s; margin:0.2rem 0px; ">
                    <div class="video-wrapper"></div>
                    <div class="video-name">
                        <div class="small-header anim" style="--delay: .3s; margin-bottom:0px">
                            <span style="font-size:10px; ">Reach Out For Help</span><br>
                            New Support Ticket
                        </div>
                    </div>
                    <div class="video-view" style="padding: 10px 20px 0px;">
                        Our Staff is ready to assist with any support queries
                    </div>

                    <div class="video-view" style="padding: 10px 20px 0px;">Support Subject</div>
                    <div class="video-name">
                        <div class="search-bar" style="max-width: 100%;">
                            <input placeholder="e.g (Issues With Account)" type="text" id="edt_faq_question" style="background-image: none; max-width: 100%;">
                        </div>
                    </div>
                    <div class="video-view" style="padding: 10px 20px 0px;">Description</div>
                    <div class="video-name">
                        <div class="search-bar" style="max-width: 100%; height: auto;">
                            <textarea id="edt_response" placeholder="Your Support Description" style="width: 100%; height: 14rem;border: none;background-color: var(--button-bg);border-radius: 8px; font-family: var(--body-font); font-size: 14px; font-weight: 500; padding: 10px 40px 0 16px; box-shadow: 0 0 0 2px rgba(134, 140, 160, 0.02); color: #fff;"></textarea>
                        </div>
                    </div>
                    <div style="display: flex; flex-direction: row; justify-content: space-between; margin:10px 20px; ">
                        <button onclick="add_faq()">Create Ticket</button>
                    </div>
                    <div class="video-view"></div>
                </div>
            </div>';
            echo $html;
        } else if ($internal_page == "ticket") {
            $faq_id = map_page()[4] ?? false;
            $sql = "SELECT * FROM `tblsupport_chats` WHERE (id = {$faq_id}) AND (`client_code` = '" . __USER_CODE__ . "')";
            $faq_data = $db->query($sql);
            if (empty($faq_data)) {
                echo "<div class='error'>Data not found.</div>";
                exit();
            }
            //print_r($faq_data);
            $faq_data = $faq_data[0];

            $html = '
            <div id="section_faq" style="display: contents;">
                <div class="video anim" style="--delay: .4s; margin:0.2rem 0px; ">
                    <div class="video-wrapper"></div>
                    <button onclick="delete_faq(`' . $faq_data['id'] . '`)">Close Ticket</button>
                    <div class="video-name">
                        <div class="small-header anim" style="--delay: .3s; margin-bottom:0px">
                            <span style="font-size:10px; ">Active Ticket</span><br>
                            Support Ticket
                        </div>
                    </div>
                        <div class="card-container">
                        <div class="card-body">
                            <div class="messages-container">'; 
                    if (isset($faq_data['client_code']) && !empty($faq_data['client_code'])){
                        $html .= '<div class="message-box right">
                                    <p>'.nl2br(base_decryption($faq_data['client_data'])).'</p>
                                </div>'; 
                    }else{
                        $html .= '<div class="message-box left">
                                    <p>'.nl2br(base_decryption($faq_data['response'])).'</p>
                                </div>'; 
                    }
                    $html .= '
                            </div>
                        </div>
                    </div>



                    <div class="video-view" style="padding: 10px 20px 0px;">Message</div>
                    <div class="video-name">
                        <div class="search-bar" style="max-width: 100%; height: auto;">
                            <textarea id="edt_response" placeholder="Your Ticket Response" style="width: 100%; height: 4rem;border: none;background-color: var(--button-bg);border-radius: 8px; font-family: var(--body-font); font-size: 14px; font-weight: 500; padding: 10px 40px 0 16px; box-shadow: 0 0 0 2px rgba(134, 140, 160, 0.02); color: #fff;">' . $faq_data['response'] . '</textarea>
                        </div>
                    </div>
                    <div style="display: flex; flex-direction: row; justify-content: space-between; margin:10px 20px; ">
                        <span></span>
                        <button onclick="edit_faq(`' . $faq_data['id'] . '`)">Send <img src="/@rescources/icons/paper-plane/" style="width:2rem; height:auto; filter:invert(1); " ></button>
                    </div>
                    <div class="video-view"></div>
                </div>
            </div>';
            echo $html;
        } else {

            $html_template = '
            <br>
                <div style="display: contents;">
                    <div onclick="window.location=`' . __PAGE__ . map_page()[2] . '/ticket/[ID]/`" class="video anim" style="--delay: .4s; margin:0.2rem 0px; ">
                        <div class="video-wrapper"></div>
                        <div class="video-name">
                            <div class="small-header anim" style="--delay: .3s; margin-bottom:0px">
                                <span style="font-size:10px; "># [TIME]</span><br>
                                [TITLE]
                            </div>
                        </div>
                        <div class="video-view" style="padding: 10px 20px 0px;">
                            [RESPONSE]
                        </div>
                        <br><br>
                    </div>
                </div>
            ';

            echo '
                <div class="anim" style="padding: 10px 5px 0px; --delay: .4s;">
                    <div style="display: flex; flex-direction: row-reverse; justify-content: space-between; margin:10px 0px; ">
                        <button onclick="window.location=`' . __PAGE__ . map_page()[2] . '/create-ticket/' . '`">
                            Create Ticket
                        </button>
                    </div>
                </div>
            '; 

            $faq_data = $db->query("SELECT * FROM tblsupport WHERE (`user_code` = '" . __USER_CODE__ . "') ORDER BY `id` DESC ");
            if (empty($faq_data)) {
                $html = '
                <div style="display: flex; align-items: center; justify-content: center; flex-direction: column;">
                <img style="filter:invert(1)" width="200" height="200" src="https://img.icons8.com/pastel-glyph/100/empty-box.png" alt="empty-box"/>
                <br>
                <div>You Dont Have Any Support Tickets <div></div>
                '; 
                echo $html; 
            } else {
                $html = '';
                foreach ($faq_data as $faq) {
                    $html .= str_replace(
                        ['[ID]', '[TITLE]', '[DEPARTMENT]', '[TIME]', '[RESPONSE]'],
                        [$faq['id'], base_decryption($faq['subject']), base_decryption($faq['description']), date('Y-m-d', strtotime($faq['created_at'])), base_decryption($faq['description'])],
                        $html_template
                    );
                }
                $html .= '';
                echo $html;
            }
        }
        ?>
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