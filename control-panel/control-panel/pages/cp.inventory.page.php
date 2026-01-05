<?php
$internal_page = map_page()[3] ?? false;
if (empty($internal_page)) {
    $internal_page = "dashboard";
}
$db = __DATABASE_WEBSITE__; 
?>

<div class="wrapper" style="overflow: auto">
    <?php include_once "blade.navbar.sidebar.php"; ?>
    <div class="main-container" id="application_canvas" style="overflow: visible">


        <div style="padding: 2rem;">
        </div>
        <div
            style="background: #0000006b;padding: 1rem 2rem 3rem 2rem;border-radius: 2rem;border-style: solid;border-color: #242424;">
            <div class="small-header" style=" margin-bottom:0px">
                <span style="font-size:10px; ">Site Inventory</span><br>
                Products Page
            </div>
            <br><span class="" style="font-size: 10px;">Manage your online store products.</span>
        </div>

        <?php
        if ($internal_page == "add-product") {
            $html = '
            <div id="section_seo" style="display: contents;">
                <div class="video anim" style="--delay: .4s; margin:0.2rem 0px; ">
                    <div class="video-wrapper"></div>
                    <div class="video-name">
                        <div class="small-header anim" style="--delay: .3s; margin-bottom:0px">
                            <span style="font-size:10px; ">Add New Product to Inventory</span><br>
                            Add Product
                        </div>
                    </div>
                    <div class="video-view" style="padding: 10px 20px 0px;">
                        Adding products will increase your store inventory. 
                    </div>

                    <div class="video-view" style="padding: 10px 20px 0px;">Product Title</div>
                    <div class="video-name">
                        <div class="search-bar" style="max-width: 100%;">
                            <input placeholder="Product Name" type="text" id="edt_product_title" style="background-image: none; max-width: 100%;">
                        </div>
                    </div>

                    <div class="video-view" style="padding: 10px 20px 0px;">Product Image</div>
                    <div class="video-name">
                        <img class="add_media_data" id="product-add-media" src="'.__PROTOCOL__ . __DOMAIN_NAME__ . '/@media/sharie_image"  style="max-width: 75vw; max-height: 75vh; object-fit: cover; border-radius: 8px; margin-bottom: 10px; margin: 10px auto; display: block; height: fit-content; width: fit-content;">
                    </div>

                    
                    <div class="video-view" style="padding: 10px 20px 0px;">Product Price ('.__CURRENCY_SIGN__.')</div>
                    <div class="video-name">
                        <div class="search-bar" style="max-width: 100%;">
                            <input value="0.00" placeholder="0.00" type="text" id="edt_product_price" style="background-image: none; max-width: 100%;">
                        </div>
                    </div>

                    <div class="video-view" style="padding: 10px 20px 0px;">Sale Price ('.__CURRENCY_SIGN__.')</div>
                    <div class="video-name">
                        <div class="search-bar" style="max-width: 100%;">
                            <input value="0.00" placeholder="0.00" type="text" id="edt_product_sale" style="background-image: none; max-width: 100%;">
                        </div>
                    </div>

                    <div class="video-view" style="padding: 10px 20px 0px;">Category </div>
                    <div class="video-name">
                        <div class="search-bar" style="max-width: 100%;">
                            <input value="Merch" placeholder="0.00" type="text" id="edt_product_title" style="background-image: none; max-width: 100%;">
                        </div>
                    </div>

                    <div class="video-view" style="padding: 10px 20px 0px;">Description </div>
                    <div class="video-name">
                        <div class="search-bar" style="max-width: 100%; height:auto; ">
                            <textarea style="font:inherit;  height: 10rem; width: 100%; padding: 10px; border-radius: 5px; border: none; background-color: #353340; color: white;" rows="10"></textarea>
                        </div>
                    </div>

                    <div class="video-view" style="padding: 10px 20px 0px;">Product Stock (Optional) </div>
                    <div class="video-name">
                        <div class="search-bar" style="max-width: 100%;">
                            <input value="0" placeholder="Amount Of Products In Hand" type="number" id="edt_product_stock" style="background-image: none; max-width: 100%;">
                        </div>
                    </div>
                    
                    <div class="video-view" style="padding: 10px 20px 0px;">Product Brand (Optional) </div>
                    <div class="video-name">
                        <div class="search-bar" style="max-width: 100%;">
                            <input placeholder="Product Brand" type="text" id="edt_product_brand" style="background-image: none; max-width: 100%;">
                        </div>
                    </div>

                    
                    <div class="video-view" style="padding: 10px 20px 0px;">Product SKU (Optional) </div>
                    <div class="video-name">
                        <div class="search-bar" style="max-width: 100%;">
                            <input value="'.uniqid("product_id_",true).'" placeholder="Inventory SKU " type="text" id="edt_category_title" style="background-image: none; max-width: 100%;">
                        </div>
                    </div>
                    
                    <div style="display: flex; flex-direction: row; justify-content: space-between; margin:10px 20px; ">
                        <button onclick="add_product()">Save Data</button>
                    </div>
                    <div class="video-view"></div>
                </div>
            </div>';

            echo $html;
        } else {

            $html_template = '
                <div class="responsive anim" style="--delay: .4s;">
                    <div class="gallery">
                        <a>
                            <img style="aspect-ratio:7/6; object-fit: cover; " src="[IMAGE]">
                        </a>
                        <div class="video-name">
                            <div class="small-header anim" style="--delay: .3s; font-size:20px; margin: 0px 0px 10px 0px;">
                                <span style="font-size:10px; "># Category</span><br>
                                [TITLE]
                            </div>
                        </div>
                    </div>
                </div>
            ';

            $faq_data = $db->query("SELECT * FROM `products` ORDER BY `id` DESC");
            if (empty($faq_data)) {
                $html = '
                <div class="anim" style="padding: 10px 5px 0px; --delay: .4s;">
                    <div style="display: flex; flex-direction: row-reverse; justify-content: space-between; margin:10px 0px; ">
                        <button onclick="window.location=`'.__PAGE__ . map_page()[2] . '/add-product/'.'`">
                            Create New Product
                        </button>
                    </div>
                </div>
                <div>';

                
                $html = '<div class="anim" style="display: flex; align-items: center; flex-direction: column;"><h2><svg fill="white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" style="height: 15rem;"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M160 96C124.7 96 96 124.7 96 160L96 480C96 515.3 124.7 544 160 544L480 544C515.3 544 544 515.3 544 480L544 160C544 124.7 515.3 96 480 96L160 96zM224 176C250.5 176 272 197.5 272 224C272 250.5 250.5 272 224 272C197.5 272 176 250.5 176 224C176 197.5 197.5 176 224 176zM368 288C376.4 288 384.1 292.4 388.5 299.5L476.5 443.5C481 450.9 481.2 460.2 477 467.8C472.8 475.4 464.7 480 456 480L184 480C175.1 480 166.8 475 162.7 467.1C158.6 459.2 159.2 449.6 164.3 442.3L220.3 362.3C224.8 355.9 232.1 352.1 240 352.1C247.9 352.1 255.2 355.9 259.7 362.3L286.1 400.1L347.5 299.6C351.9 292.5 359.6 288.1 368 288.1z"></path></svg></h2><h2>No Products Available</h2><br>This store does not have any products</div>
                        <br>
                        <button style="margin:auto;" onclick="window.location=`'.__PAGE__ . map_page()[2] . '/add-product/'.'`">
                            Create Product
                        </button>';
                

                echo $html; 
            } else {
                $html = '
                <div class="anim" style="padding: 10px 5px 0px; --delay: .4s;">
                    <div style="display: flex; flex-direction: row-reverse; justify-content: space-between; margin:10px 0px; ">
                        <button onclick="window.location=`'.__PAGE__ . map_page()[2] . '/add-product/'.'`">
                            Create New Product
                        </button>
                    </div>
                </div>
                <div>';
                foreach ($faq_data as $_data) {
                    $html .= str_replace(
                        ['[ID]', '[TITLE]', '[IMAGE]'],
                        [$_data['id'], $_data['title'], _media_(__PROTOCOL__.__DOMAIN_NAME__.'/@media/'.$_data['image'])],
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
?>
<script>

    async function add_product(){
        operate_loader();
        const title = document.getElementById("edt_product_title").value;
        const image = document.getElementById("product-add-media").src;

        if (title.trim() === "" || image.trim() === "") {
            operate_loader("stop");
            error_feedback('Please fill in fields before saving.');
            return;
        }
        const data = new URLSearchParams();
        data.append('request', 'create-product');
        data.append('title', title);
        data.append('image', image);
        let registration_confirmation = await sendAndReceiveData(data, "<?php echo __PROTOCOL__ . __DOMAIN_NAME__ . '/@scripts/scripts.php'; ?>");
        alert(registration_confirmation); 
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