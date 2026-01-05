<?php
$internal_page = map_page()[3] ?? false;
if (empty($internal_page)) {
    $internal_page = "dashboard";
}
?>

<div class="wrapper" style="overflow: auto">
    <?php include_once "blade.navbar.sidebar.php"; ?>
    <div class="main-container" id="application_canvas" style="overflow: visible">

        <div class="main-header anim" style="--delay: 0s; text-align: center; padding: 4rem 3rem 1rem 3rem; position: inherit;">
            Media Library
        </div>
        <?php
        if ($internal_page == "add-image") {
            $html = '<div id="media_container">
            <div id="add_media_contents_tab">
                <input type="file" id="hiddenFileInput" accept="image/*">

                <div style="height: 60vh;" id="imagePreviewContainer">
                    <img style=" max-height:21rem; ;" id="previewImage" src="" alt="Image Preview">
                    <p id="noImageSelectedText">No image selected</p>
                </div>
                <br>
                <div style="display: flex;">
                    <label for="hiddenFileInput" style="background-color: #312e2a; margin: 0px 10px 0px 0px;" class="custom-file-upload">
                        Choose Image
                    </label>
                    <button id="submitButton">Submit Image</button>
                </div>
            </div></div><script>
            document.addEventListener(\'DOMContentLoaded\', function(){
                request_media(); 
            });
            </script>
            
            ';
            echo $html;
        } else {

            @include_once dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . "systemctrl.php";
            $data_sets = __DATABASE_WEBSITE__->query("SELECT * FROM gallery ORDER BY `id` DESC");
            $template_row = '
                    <div class="responsive">
                        <div class="gallery" style="padding:10px">
                            <a target="_blank">
                                <img style="aspect-ratio:7/7; object-fit:cover; " src="PATH" alt="TITLE" width="600" height="400">
                                <div style="margin:-3rem 5px 0px 5px; ">

                                    <div style="margin-top: 1rem; z-index: 2; position: sticky;">
                                        <h4 style="padding: 8px; background-color: #ffffff; border-radius: 8px; width: min-content; height: min-content; margin-top: 2rem; margin-bottom: 0rem;"><i class="fa-regular fa-trash-can"></i></h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>';
            $output = "";
            function e($data){return file_get_contents($data);}
            foreach ($data_sets as $media_e) {
                $output .= str_ireplace(
                    ['TITLE', 'DESCRIPTION', 'PATH', 'HASH'],
                    [$media_e['title'], $media_e['description'], _media_(__PROTOCOL__ . __DOMAIN_NAME__ . "/@media/" . $media_e['hash']), $media_e['hash']],
                    $template_row
                );
            }

            if (empty($output)) {
                $output = '<div class="anim" style="display: flex; align-items: center; flex-direction: column;"><h2><svg fill="white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" style="height: 15rem;"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M160 96C124.7 96 96 124.7 96 160L96 480C96 515.3 124.7 544 160 544L480 544C515.3 544 544 515.3 544 480L544 160C544 124.7 515.3 96 480 96L160 96zM224 176C250.5 176 272 197.5 272 224C272 250.5 250.5 272 224 272C197.5 272 176 250.5 176 224C176 197.5 197.5 176 224 176zM368 288C376.4 288 384.1 292.4 388.5 299.5L476.5 443.5C481 450.9 481.2 460.2 477 467.8C472.8 475.4 464.7 480 456 480L184 480C175.1 480 166.8 475 162.7 467.1C158.6 459.2 159.2 449.6 164.3 442.3L220.3 362.3C224.8 355.9 232.1 352.1 240 352.1C247.9 352.1 255.2 355.9 259.7 362.3L286.1 400.1L347.5 299.6C351.9 292.5 359.6 288.1 368 288.1z"></path></svg></h2><h2>No Content</h2><br>No Media Available</div>';
            }

            echo '
            <div class="anim" style="padding: 10px 5px 0px; --delay: .4s;">
                <div style="display: flex; flex-direction: row-reverse; justify-content: space-between; margin:10px 0px; ">
                    <button onclick="window.location=`'.__PAGE__ . map_page()[2] . '/add-image/'.'`">
                        Upload Image 
                    </button>
                </div>
            </div>
            
            <div>' . $output . '</div>';
        }
        ?>
    </div>
</div>