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
            <svg style="width: 2rem;"  fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M21.5 181.1L78.3 67.4C89.2 45.7 111.3 32 135.6 32l304.9 0c24.2 0 46.4 13.7 57.2 35.4l56.8 113.7c3.6 7.2 5.5 15.1 5.5 23.2 0 27.3-21.2 49.7-48 51.6L512 448c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-192-96 0 0 176c0 26.5-21.5 48-48 48l-192 0c-26.5 0-48-21.5-48-48l0-176.1c-26.8-1.9-48-24.3-48-51.6 0-8 1.9-16 5.5-23.2zM128 256l0 112c0 8.8 7.2 16 16 16l128 0c8.8 0 16-7.2 16-16l0-112-160 0z"/></svg>
           Online Shop
        </div>

            <div>
                <div class="responsive anim" style="--delay: .4s;">
                    <div class="gallery">
                        <div style="background-color: #242424; padding: 10px;">   
                        
                        <h1 style="display: flex; flex-direction: row; justify-content: center; align-items: center; align-content: space-between;"><span><svg style="filter: invert(1); width: 2rem;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M320.2 112c44.2 0 80-35.8 80-80l53.5 0c17 0 33.3 6.7 45.3 18.7L617.6 169.4c12.5 12.5 12.5 32.8 0 45.3l-50.7 50.7c-12.5 12.5-32.8 12.5-45.3 0l-41.4-41.4 0 224c0 35.3-28.7 64-64 64l-192 0c-35.3 0-64-28.7-64-64l0-224-41.4 41.4c-12.5 12.5-32.8 12.5-45.3 0L22.9 214.6c-12.5-12.5-12.5-32.8 0-45.3L141.5 50.7c12-12 28.3-18.7 45.3-18.7l53.5 0c0 44.2 35.8 80 80 80z"/></svg></span> Inventory</h1>
                        <p>Manage Your Store Products</p>
                        <button onclick="window.location = '<?php echo change_page('inventory') ?>'">View Page</button>

                        </div>
                    </div>
                </div>

                <div class="responsive anim" style="--delay: .4s;">
                    <div class="gallery">
                        <div style="background-color: #242424; padding: 10px;">   
                        
                        <h1 style="display: flex; flex-direction: row; justify-content: center; align-items: center; align-content: space-between;"><span><svg style="filter: invert(1); width: 2rem;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M320.2 112c44.2 0 80-35.8 80-80l53.5 0c17 0 33.3 6.7 45.3 18.7L617.6 169.4c12.5 12.5 12.5 32.8 0 45.3l-50.7 50.7c-12.5 12.5-32.8 12.5-45.3 0l-41.4-41.4 0 224c0 35.3-28.7 64-64 64l-192 0c-35.3 0-64-28.7-64-64l0-224-41.4 41.4c-12.5 12.5-32.8 12.5-45.3 0L22.9 214.6c-12.5-12.5-12.5-32.8 0-45.3L141.5 50.7c12-12 28.3-18.7 45.3-18.7l53.5 0c0 44.2 35.8 80 80 80z"/></svg></span> 
                        Brands</h1>
                        <p>Manage Your Store Products</p>
                        <button onclick="window.location = '<?php echo change_page('brands') ?>'">View Page</button>

                        </div>
                    </div>
                </div>

                                <div class="responsive anim" style="--delay: .4s;">
                    <div class="gallery">
                        <div style="background-color: #242424; padding: 10px;">   
                        
                        <h1 style="display: flex; flex-direction: row; justify-content: center; align-items: center; align-content: space-between;"><span><svg style="filter: invert(1); width: 2rem;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M320.2 112c44.2 0 80-35.8 80-80l53.5 0c17 0 33.3 6.7 45.3 18.7L617.6 169.4c12.5 12.5 12.5 32.8 0 45.3l-50.7 50.7c-12.5 12.5-32.8 12.5-45.3 0l-41.4-41.4 0 224c0 35.3-28.7 64-64 64l-192 0c-35.3 0-64-28.7-64-64l0-224-41.4 41.4c-12.5 12.5-32.8 12.5-45.3 0L22.9 214.6c-12.5-12.5-12.5-32.8 0-45.3L141.5 50.7c12-12 28.3-18.7 45.3-18.7l53.5 0c0 44.2 35.8 80 80 80z"/></svg></span>
                             Category</h1>
                        <p>Manage Your Store Products</p>
                        <button onclick="window.location = '<?php echo change_page('category') ?>'">View Page</button>

                        </div>
                    </div>
                </div>

                <div class="responsive anim" style="--delay: .4s;">
                    <div class="gallery">
                        <div style="background-color: #242424; padding: 10px;">   
                        
                        <h1 style="display: flex; flex-direction: row; justify-content: center; align-items: center; align-content: space-between;">
                            <span>
                                <svg style="filter: invert(1); width: 2rem;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M288-16c-13.3 0-24 10.7-24 24l0 12-1.8 0c-36.6 0-66.2 29.7-66.2 66.2 0 33.4 24.9 61.6 58 65.7l61 7.6c5.1 .6 9 5 9 10.2 0 5.7-4.6 10.2-10.2 10.2L240 180c-15.5 0-28 12.5-28 28s12.5 28 28 28l24 0 0 12c0 13.3 10.7 24 24 24s24-10.7 24-24l0-12 1.8 0c36.6 0 66.2-29.7 66.2-66.2 0-33.4-24.9-61.6-58-65.7l-61-7.6c-5.1-.6-9-5-9-10.2 0-5.7 4.6-10.2 10.2-10.2L328 76c15.5 0 28-12.5 28-28s-12.5-28-28-28l-16 0 0-12c0-13.3-10.7-24-24-24zM109.3 341.5L66.7 384 32 384c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l320.5 0c29 0 57.3-9.3 80.7-26.5l126.6-93.3c17.8-13.1 21.6-38.1 8.5-55.9s-38.1-21.6-55.9-8.5L392.6 416 280 416c-13.3 0-24-10.7-24-24s10.7-24 24-24l72 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-152.2 0c-33.9 0-66.5 13.5-90.5 37.5z"/></svg>
                            </span> 
                            Coupons
                        </h1>
                        <p>Your Store Discounts</p>
                        <button>View Page</button>

                        </div>
                    </div>
                </div>

                <div class="responsive anim" style="--delay: .4s;">
                    <div class="gallery">
                        <div style="background-color: #242424; padding: 10px;">   
                        
                        <h1 style="display: flex; flex-direction: row; justify-content: center; align-items: center; align-content: space-between;">
                            <span>
                                <svg style="filter: invert(1); width: 2rem;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M288-16c-13.3 0-24 10.7-24 24l0 12-1.8 0c-36.6 0-66.2 29.7-66.2 66.2 0 33.4 24.9 61.6 58 65.7l61 7.6c5.1 .6 9 5 9 10.2 0 5.7-4.6 10.2-10.2 10.2L240 180c-15.5 0-28 12.5-28 28s12.5 28 28 28l24 0 0 12c0 13.3 10.7 24 24 24s24-10.7 24-24l0-12 1.8 0c36.6 0 66.2-29.7 66.2-66.2 0-33.4-24.9-61.6-58-65.7l-61-7.6c-5.1-.6-9-5-9-10.2 0-5.7 4.6-10.2 10.2-10.2L328 76c15.5 0 28-12.5 28-28s-12.5-28-28-28l-16 0 0-12c0-13.3-10.7-24-24-24zM109.3 341.5L66.7 384 32 384c-17.7 0-32 14.3-32 32l0 64c0 17.7 14.3 32 32 32l320.5 0c29 0 57.3-9.3 80.7-26.5l126.6-93.3c17.8-13.1 21.6-38.1 8.5-55.9s-38.1-21.6-55.9-8.5L392.6 416 280 416c-13.3 0-24-10.7-24-24s10.7-24 24-24l72 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-152.2 0c-33.9 0-66.5 13.5-90.5 37.5z"/></svg>
                            </span> 
                            Promotion
                        </h1>
                        <p>Launch Your Store Sale</p>
                        <button>View Page</button>

                        </div>
                    </div>
                </div>

                <div class="responsive anim" style="--delay: .4s;">
                    <div class="gallery">
                        <div style="background-color: #242424; padding: 10px;">   
                        
                        <h1 style="font-size: 1.3 rem; display: flex; flex-direction: row; justify-content: center; align-items: center; align-content: space-between;">
                            <span>
                                <svg style="filter: invert(1); width: 2rem;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M288-32a96 96 0 1 1 0 192 96 96 0 1 1 0-192zM48 304c0-70.1 47-131.4 117.1-164.9 25.3 41.3 70.9 68.9 122.9 68.9 55.7 0 104.1-31.7 128-78 15.8-11.3 35.1-18 56-18l19.5 0c10.4 0 18 9.8 15.5 19.9l-17.1 68.3c9.9 12.4 18.2 25.7 24.4 39.8l21.7 0c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24l-40 0c-16.5 22-38.5 39.6-64 50.7l0 29.3c0 17.7-14.3 32-32 32l-33 0c-14.3 0-26.8-9.5-30.8-23.2l-7.1-24.8-82.3 0-7.1 24.8C235.8 502.5 223.3 512 209 512l-33 0c-17.7 0-32-14.3-32-32l0-29.3C87.5 426 48 369.6 48 304zm376 16a24 24 0 1 0 0-48 24 24 0 1 0 0 48z"/></svg>
                            </span> 
                            Payment Gateway
                        </h1>
                        <p>The Payment system your store will use</p>
                        <button>View Page</button>

                        </div>
                    </div>
                </div>



                <div class="responsive anim" style="--delay: .4s;">
                    <div class="gallery">
                        <div style="background-color: #242424; padding: 10px;">   
                        
                        <h1 style="display: flex; flex-direction: row; justify-content: center; align-items: center; align-content: space-between;">
                            <span>
                                <svg style="filter: invert(1); width: 2rem;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M70.8-6.7c5.4-5.4 13.8-6.2 20.2-2L209.9 70.5c8.9 5.9 14.2 15.9 14.2 26.6l0 49.6 90.8 90.8c33.3-15 73.9-8.9 101.2 18.5L542.2 382.1c18.7 18.7 18.7 49.1 0 67.9l-60.1 60.1c-18.7 18.7-49.1 18.7-67.9 0L288.1 384c-27.4-27.4-33.5-67.9-18.5-101.2l-90.8-90.8-49.6 0c-10.7 0-20.7-5.3-26.6-14.2L23.4 58.9c-4.2-6.3-3.4-14.8 2-20.2L70.8-6.7zm145 303.5c-6.3 36.9 2.3 75.9 26.2 107.2l-94.9 95c-28.1 28.1-73.7 28.1-101.8 0s-28.1-73.7 0-101.8l135.4-135.5 35.2 35.1zM384.1 0c20.1 0 39.4 3.7 57.1 10.5 10 3.8 11.8 16.5 4.3 24.1L388.8 91.3c-3 3-4.7 7.1-4.7 11.3l0 41.4c0 8.8 7.2 16 16 16l41.4 0c4.2 0 8.3-1.7 11.3-4.7l56.7-56.7c7.6-7.5 20.3-5.7 24.1 4.3 6.8 17.7 10.5 37 10.5 57.1 0 43.2-17.2 82.3-45 111.1l-49.1-49.1c-33.1-33-78.5-45.7-121.1-38.4l-56.8-56.8 0-29.7-.2-5c-.8-12.4-4.4-24.3-10.5-34.9 29.4-35 73.4-57.2 122.7-57.3z"/></svg>
                            </span> 
                            Settings
                        </h1>
                        <p>Set your store settings</p>
                        <button>View Page</button>

                        </div>
                    </div>
                </div>

            </div>

        <?php
        if ($internal_page == "add-faq") {
            $html = '
            <div id="section_seo" style="display: contents;">
                <div class="video anim" style="--delay: .4s; margin:0.2rem 0px; ">
                    <div class="video-wrapper"></div>
                    <div class="video-name">
                        <div class="small-header anim" style="--delay: .3s; margin-bottom:0px">
                            <span style="font-size:10px; ">Add New FAQ to Site</span><br>
                            New Frequently Asked Question
                        </div>
                    </div>
                    <div class="video-view" style="padding: 10px 20px 0px;">
                        Add a new FAQ to your website. This will help users find answers to common questions.
                    </div>

                    <div class="video-view" style="padding: 10px 20px 0px;">Question</div>
                    <div class="video-name">
                        <div class="search-bar" style="max-width: 100%;">
                            <input placeholder="FAQ Question" type="text" id="edt_faq_question" style="background-image: none; max-width: 100%;">
                        </div>
                    </div>
                    <div class="video-view" style="padding: 10px 20px 0px;">Response</div>
                    <div class="video-name">
                        <div class="search-bar" style="max-width: 100%; height: auto;">
                            <textarea id="edt_response" placeholder="Your FAQ Response" style="width: 100%; height: 7rem;border: none;background-color: var(--button-bg);border-radius: 8px; font-family: var(--body-font); font-size: 14px; font-weight: 500; padding: 10px 40px 0 16px; box-shadow: 0 0 0 2px rgba(134, 140, 160, 0.02); color: #fff;"></textarea>
                        </div>
                    </div>
                    <div style="display: flex; flex-direction: row; justify-content: space-between; margin:10px 20px; ">
                        <button onclick="add_faq()">Save Data</button>
                    </div>
                    <div class="video-view"></div>
                </div>
            </div>';
            echo $html;
        } else if ($internal_page == "edit-faq") {
            $faq_id = map_page()[4] ?? false;
            $sql = "SELECT * FROM faq WHERE id = {$faq_id}";
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
                            <span style="font-size:10px; ">Edit FAQ</span><br>
                            Edit Frequently Asked Question
                        </div>
                    </div>
                    <div class="video-view" style="padding: 10px 20px 0px;">
                        Managing your FAQ will help users find answers to common questions.
                    </div>
                    <div class="video-view" style="padding: 10px 20px 0px;">Date Upload: ' . date('Y-m-d', strtotime($faq_data['created_at'])) . '</div>
                    <br>

                    <div class="video-view" style="padding: 10px 20px 0px;">Question</div>
                    <div class="video-name">
                        <div class="search-bar" style="max-width: 100%;">
                            <input value="' . $faq_data['question'] . '" placeholder="FAQ Question" type="text" id="edt_faq_question" style="background-image: none; max-width: 100%;">
                        </div>
                    </div>
                    <div class="video-view" style="padding: 10px 20px 0px;">Response</div>
                    <div class="video-name">
                        <div class="search-bar" style="max-width: 100%; height: auto;">
                            <textarea id="edt_response" placeholder="Your FAQ Response" style="width: 100%; height: 7rem;border: none;background-color: var(--button-bg);border-radius: 8px; font-family: var(--body-font); font-size: 14px; font-weight: 500; padding: 10px 40px 0 16px; box-shadow: 0 0 0 2px rgba(134, 140, 160, 0.02); color: #fff;">' . $faq_data['response'] . '</textarea>
                        </div>
                    </div>
                    <div style="display: flex; flex-direction: row; justify-content: space-between; margin:10px 20px; ">
                        <button onclick="delete_faq(`'.$faq_data['id'].'`)">Delete Faq</button>
                        <button onclick="edit_faq(`'.$faq_data['id'].'`)">Save Data</button>
                    </div>
                    <div class="video-view"></div>
                </div>
            </div>';
            echo $html;
        } else {

            $html_template = '
            <br>
                <div style="display: contents;">
                    <div onclick="window.location=`' . __PAGE__ . map_page()[2] . '/edit-faq/[ID]/`" class="video anim" style="--delay: .4s; margin:0.2rem 0px; ">
                        <div class="video-wrapper"></div>
                        <div class="video-name">
                            <div class="small-header anim" style="--delay: .3s; margin-bottom:0px">
                                <span style="font-size:10px; "># [DEPARTMENT]</span><br>
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

            $faq_data = $db->query("SELECT * FROM faq");
            if (empty($faq_data)) {
            } else {
                $html = '';
                foreach ($faq_data as $faq) {
                    $html .= str_replace(
                        ['[ID]', '[TITLE]', '[DEPARTMENT]', '[TIME]', '[RESPONSE]'],
                        [$faq['id'], $faq['question'], $faq['category'], date('Y-m-d', strtotime($faq['created_at'])), $faq['response']],
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