<?php
$internal_page = map_page()[3] ?? false;
if (empty($internal_page)) {
    $internal_page = "dashboard";
}
?>

<div class="wrapper" style="overflow: auto">
    <?php include_once "blade.navbar.sidebar.php"; ?>
    <div class="main-container" id="application_canvas" style="overflow: visible">
        <div style="padding: 2rem;">

        </div>
        <div class="main-header anim" style="--delay: 0s; text-align: center; padding: 1rem 3rem; position: inherit;">
            Contact Forms
        </div>

        <?php
        if ($internal_page == "view-form") {
            $faq_id = map_page()[4] ?? false;
            $sql = "SELECT * FROM contact_form WHERE id = '$faq_id'";
            $faq_data = $db->query($sql);
            if (empty($faq_data)) {
                echo "<div class='error'>FAQ not found.</div>";
                exit();
            }
            $faq_data = $faq_data[0];

            $html = '
            <div id="section_faq" style="display: contents;">
                <div class="video anim" style="--delay: .4s; margin:0.2rem 0px; ">
                    <div class="video-wrapper"></div>
                    <div class="video-name">
                        <div class="small-header anim" style="--delay: .3s; margin-bottom:0px">
                            <span style="font-size:10px; ">Manage Forms</span><br>
                            View Contact Forms
                        </div>
                    </div>
                    <div class="video-view" style="padding: 10px 20px 0px;">
                        Manage Contact Form, and view the details of the contact form.
                    </div>
                    <div class="video-view" style="padding: 10px 20px 0px;">Date Upload: ' . date('Y-m-d', strtotime($faq_data['date'])) . '</div>
                    <br>

                    <div class="video-view" style="padding: 10px 20px 0px;">Name</div>
                    <div class="video-name">
                        <div class="search-bar" style="max-width: 100%;">
                            <input disabled value="' . $faq_data['name'] . '" type="text" id="edt_faq_question" style="background-image: none; max-width: 100%;">
                        </div>
                    </div>
                    <div class="video-view" style="padding: 10px 20px 0px;">Contact</div>
                    <div class="video-name">
                        <div class="search-bar" style="max-width: 100%;">
                            <input disabled value="' . $faq_data['email'] . '" type="text" id="edt_faq_question" style="background-image: none; max-width: 100%;">
                        </div>
                    </div>
                    <div class="video-view" style="padding: 10px 20px 0px;">Message</div>
                    <div class="video-name">
                        <div class="search-bar" style="max-width: 100%; height: auto;">
                            <textarea id="edt_response" style="width: 100%; height: 7rem;border: none;background-color: var(--button-bg);border-radius: 8px; font-family: var(--body-font); font-size: 14px; font-weight: 500; padding: 10px 40px 0 16px; box-shadow: 0 0 0 2px rgba(134, 140, 160, 0.02); color: #fff;">' . $faq_data['subject'] . '</textarea>
                        </div>
                    </div>
                    <div style="display: flex; flex-direction: row; justify-content: space-between; margin:10px 20px; ">
                        <button onclick="delete_faq(`'.$faq_data['id'].'`)">Delete Record</button>
                        <button onclick="edit_faq(`'.$faq_data['id'].'`)">Direct Response</button>
                    </div>
                    <div class="video-view"></div>
                </div>
            </div>';
            echo $html;
        } else {

            $html_template = '
            <br>
                <div style="display: contents;">
                    <div onclick="window.location=`' . __PAGE__ . map_page()[2] . '/view-form/[ID]/`" class="video anim" style="--delay: .4s; margin:0.2rem 0px; ">
                        <div class="video-wrapper"></div>
                        <div class="video-name">
                            <div class="small-header anim" style="--delay: .3s; margin-bottom:0px">
                                <span style="font-size:10px; "># [DEPARTMENT]</span><br>
                                [TITLE]
                            </div>
                        </div>
                        <div class="video-view" style="padding: 10px 20px 0px;">
                            [TIME]
                        </div>
                        <br><br>
                    </div>
                </div>
            ';

            $contact_data = $db->query("SELECT * FROM contact_form ORDER BY id DESC");
            if (empty($contact_data)) {
                $html = ' null data '; 
                $html = '<div class="anim" style="display: flex; align-items: center; flex-direction: column;"><h2><svg fill="white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" style="height: 15rem;"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M160 96C124.7 96 96 124.7 96 160L96 480C96 515.3 124.7 544 160 544L480 544C515.3 544 544 515.3 544 480L544 160C544 124.7 515.3 96 480 96L160 96zM224 176C250.5 176 272 197.5 272 224C272 250.5 250.5 272 224 272C197.5 272 176 250.5 176 224C176 197.5 197.5 176 224 176zM368 288C376.4 288 384.1 292.4 388.5 299.5L476.5 443.5C481 450.9 481.2 460.2 477 467.8C472.8 475.4 464.7 480 456 480L184 480C175.1 480 166.8 475 162.7 467.1C158.6 459.2 159.2 449.6 164.3 442.3L220.3 362.3C224.8 355.9 232.1 352.1 240 352.1C247.9 352.1 255.2 355.9 259.7 362.3L286.1 400.1L347.5 299.6C351.9 292.5 359.6 288.1 368 288.1z"></path></svg></h2><h2>No Data</h2><br>No Contact Forms Available</div>';
 
                echo $html; 
            } else {
                $html = '';
                foreach ($contact_data as $row) {
                    $html .= str_replace(
                        ['[ID]', '[TITLE]', '[DEPARTMENT]', '[TIME]'],
                        [$row['id'], 'Message From: '.$row['name'], $row['email'], date('Y-m-d (H:i)', strtotime($row['date']))],
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
            error_feedback('Please fill in both the question and response fields.');
            return;
        }
        const data = new URLSearchParams();
        data.append('request', 'create-faq');
        data.append('question', question);
        data.append('response', response);
        let registration_confirmation = await sendAndReceiveData(data, "<?php echo __PROTOCOL__ . __DOMAIN_NAME__ . '/executables/script.php'; ?>");
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

        let registration_confirmation = await sendAndReceiveData(data, "<?php echo __PROTOCOL__ . __DOMAIN_NAME__ . '/executables/script.php'; ?>");
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

        let registration_confirmation = await sendAndReceiveData(data, "<?php echo __PROTOCOL__ . __DOMAIN_NAME__ . '/executables/script.php'; ?>");
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