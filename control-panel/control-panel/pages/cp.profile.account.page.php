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
            Account Profile
        </div>


        <style>
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
                background-color: #252936;
                padding: 10px;
            }

            td,
            th {
                text-align: left;
                padding: 8px;
            }

            td {
                background-color: white;
                color: black;
            }

            tr:nth-child(even) {
                border: 1px #252936 solid;
            }
        </style>

        <?php
        @include_once dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . "scripts.php";

        if ($internal_page == "recharge-account") {
            $html = '
            <div id="section_seo" style="display: contents;">
                <div class="video anim" style="--delay: .4s; margin:0.2rem 0px; ">
                    <div class="video-wrapper"></div>
                    <div class="video-name">
                        <div class="small-header anim" style="--delay: .3s; margin-bottom:0px">
                            <span style="font-size:10px; ">Update Your Account Wallet</span><br>
                            Recharge Your Wallet
                        </div>
                    </div>
                    <div class="video-view" style="padding: 10px 20px 0px;">
                        Recharge Your Web Hosting Account, This will allow you to have control over how much you wish to spend.
                    </div>
                    <br>
                    <div class="video-view" style="padding: 10px 20px 0px;">Budget Amount</div>
                    <div class="video-name">
                        <div class="search-bar" style="max-width: 100%;">
                            <input placeholder="R 210.00" min="18" max="100" step="1" type="number" id="edt_faq_question" style="background-image: none; max-width: 100%;">
                        </div>
                    </div>

                    <div style="display: flex; flex-direction: row; justify-content: space-between; margin:10px 20px; ">
                        <button onclick="add_faq()">Pay Now <span style="font-size:8px; padding:10px 0; ">with</span> <img src="https://files.buildwithfern.com/yoco.docs.buildwithfern.com/2025-08-13T11:54:55.076Z/pages/docs/logos/yoco.svg" style="width:3rem; height:auto; "> </button>
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
            if (isset($faq_data['client_code']) && !empty($faq_data['client_code'])) {
                $html .= '<div class="message-box right">
                                    <p>' . nl2br(base_decryption($faq_data['client_data'])) . '</p>
                                </div>';
            } else {
                $html .= '<div class="message-box left">
                                    <p>' . nl2br(base_decryption($faq_data['response'])) . '</p>
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
                <tr>
                    <td>[DESCRIPTION]</td>
                    <td>[AMOUNT]</td>
                    <td>[DATE]</td>
                </tr>
            ';

            echo '
                <div class="anim" style="padding: 10px 5px 0px; --delay: .4s;">
                    <div style="display: flex; flex-direction: row-reverse; justify-content: space-between; margin:10px 0px; ">
                        <button onclick="window.location=`' . __PAGE__ . map_page()[2] . '/recharge-account/' . '`">
                            Recharge Account
                        </button>
                    </div>
                </div>
            ';

            $_data = $db->query("SELECT * FROM `tbltransactions` WHERE (`user_code` = '" . __USER_CODE__ . "') ORDER BY `id` DESC ");
            if (empty($_data)) {
                $html = '
                <div style="display: flex; align-items: center; justify-content: center; flex-direction: column;">
                <img style="filter:invert(1)" width="200" height="200" src="https://img.icons8.com/pastel-glyph/100/empty-box.png" alt="empty-box"/>
                <br>
                <div>You Dont Have Any Transactions <div></div>
                ';
                echo $html;
            } else {
                $html = '
                <h2>Account Transactions</h2>
                <table>
                <tr>
                    <th>Description</th>
                    <th>Amount</th>
                    <th>Date</th>
                </tr>
                ';
                foreach ($_data as $faq) {
                    $html .= str_replace(
                        ['[ID]', '[DESCRIPTION]', '[AMOUNT]', '[DATE]'],
                        [$faq['id'], base_decryption($faq['description']), __CURRENCY_SIGN__ . number_format(base64_decode($faq['amount'])), date('Y/m/d', strtotime($faq['date']))],
                        $html_template
                    );
                }
                $html .= '</table>';
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
        data.append('request', 'recharge-account');
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