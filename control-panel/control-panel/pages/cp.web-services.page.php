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
            Website Services
        </div>

        <style>
            /* Basic grid container and item styles */
            .grid-container {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                grid-gap: 20px;
                padding: 20px;
            }

            .grid-item {
                padding: 5px;
                text-align: center;
                font-family: sans-serif;
            }

            /* Media query for responsiveness */
            @media (max-width: 768px) {
                .grid-container {
                    /* Changes to a single column on smaller screens */
                    grid-template-columns: 1fr;
                }
            }
        </style>

        <style>
            .webcontainer {
                position: relative;
                width: 100%;
                overflow: hidden;
                aspect-ratio: 9/7;
                zoom: 0.4;
            }

            .responsive-iframe {
                position: absolute;
                top: 0;
                left: 0;
                bottom: 0;
                right: 0;
                width: 100%;
                height: 100%;
                aspect-ratio: 3/2;
                border: none;
            }
        </style>

        <?php
        @include_once dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . "scripts.php";

        if ($internal_page == "deploy-site") {
            $html = '
            <div id="section_seo" style="display: contents;">
                <div class="video anim" style="--delay: .4s; margin:0.2rem 0px; ">
                    <div class="video-wrapper"></div>
                    <div class="video-name">
                        <div class="small-header anim" style="--delay: .3s; margin-bottom:0px">
                            <span style="font-size:10px; ">Register Your Deployment</span><br>
                            Deploy Website
                        </div>
                    </div>
                    <div class="video-view" style="padding: 10px 20px 0px;">
                        Deploying your website will allow you to activate your website for public view
                    </div>
                    <br>
                    <div class="video-view" style="padding: 10px 20px 0px;">Website Title</div>
                    <div class="video-name">
                        <div class="search-bar" style="max-width: 100%;">
                            <input placeholder="Reidrop" id="edtwebsite" style="background-image: none; max-width: 100%;">
                        </div>
                    </div>
                    
                    <div class="video-view" style="padding: 10px 20px 0px;">Domain</div>
                    <div class="video-name">
                        <div class="search-bar" style="max-width: 100%;">
                            <input placeholder="example.com" id="edtdomain" style="background-image: none; max-width: 100%;">
                        </div>
                    </div>

                    <div class="video-view" style="padding: 10px 20px 0px;">Server</div>
                    <select name="edtserver" id="edtserver">
                        <optgroup label="South African Servers">
                        <option value="R 210.00">Starter Package</option>
                        </optgroup>
                    </select>

                    <div class="video-view" style="padding: 10px 20px 0px; font-size:1.3rem; font-weight:bold; ">Monthly Fee:  R 210.00</div>

                    <div style="display: flex; flex-direction: row; justify-content: space-between; margin:10px 20px; ">
                        <button onclick="register_site()">Register Site</button>
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
            <div class="grid-item">
                <div class="webcontainer">
                    <iframe class="responsive-iframe" src="http://[SOURCE]"></iframe>
                </div>
                <br>
                <div>
                    <button onclick="window.location=`' . __PAGE__  . 'website-manager/' . '[ID]/`">
                        Manage Site
                    </button>
                </div>

            </div>
            ';

            echo '
                <div class="anim" style="padding: 10px 5px 0px; --delay: .4s;">
                    <div style="display: flex; flex-direction: row-reverse; justify-content: space-between; margin:10px 0px; ">
                        <button onclick="window.location=`' . __PAGE__ . map_page()[2] . '/deploy-site/' . '`">
                            Deploy Site
                        </button>
                    </div>
                </div>
            ';

            $_data = $db->query("SELECT * FROM `tblwebservices` WHERE (`user_code` = '" . __USER_CODE__ . "') ORDER BY `id` DESC ");
            if (empty($_data)) {
                $html = '
                <div style="display: flex; align-items: center; justify-content: center; flex-direction: column;">
                <img style="filter:invert(1)" width="200" height="200" src="https://img.icons8.com/pastel-glyph/100/empty-box.png" alt="empty-box"/>
                <br>
                <div>You Dont Have Any Registered Websites <div></div>
                ';
                echo $html;
            } else {
                $html = '
                
                <div class="grid-container">
                ';
                foreach ($_data as $faq) {
                    $html .= str_replace(
                        ['[ID]', '[SOURCE]', '[AMOUNT]', '[DATE]'],
                        [$faq['id'], base_decryption($faq['domain']), "", date('Y/m/d', strtotime($faq['date']))],
                        $html_template
                    );
                }
                $html .= '</div>';
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
    async function register_site() {
        operate_loader();
        const server = document.getElementById("edtserver").value;
        const domain = document.getElementById("edtdomain").value; 
        const website = document.getElementById("edtwebsite").value; 

        if (domain.trim() === "" || website.trim() === "") {
            operate_loader("stop");
            error_feedback('Please fill in data fields.');
            return;
        }

        const data = new URLSearchParams();
        data.append('request', 'register-website');
        data.append('server', server);
        data.append('website', website);
        data.append('domain', domain);

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