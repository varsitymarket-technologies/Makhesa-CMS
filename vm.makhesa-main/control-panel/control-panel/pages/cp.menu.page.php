<?php
$internal_page = map_page()[3] ?? false;
if (empty($internal_page)) {
    $internal_page = "dashboard";
}
?>

<style>
    /* Basic Styling for the Menu and Draggable Items */
    .menu-list {
        list-style-type: none;
        padding: 0;
        border: 1px solid #cccccc00;
    }

    .menu-item {
        padding: 10px;
        margin: 5px 0;
        background-color: #242424;
        border: 1px solid #6934b7;
        cursor: grab;
        /* Indicates it's draggable */
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .menu-item:hover {
        background-color: #f0f0f0;
    }

    /* Style for item being dragged (optional but helpful) */
    .sortable-ghost {
        opacity: 0.4;
        background-color: #c9e2f9;
    }

    .handle {
        font-size: 1.2em;
        margin-right: 10px;
        cursor: grab;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>

<div class="wrapper" style="overflow: auto">
    <?php include_once "blade.navbar.sidebar.php"; ?>
    <div class="main-container" id="application_canvas" style="overflow: visible">

        <div class="main-header anim" style="--delay: 0s; text-align: center; padding: 1rem 3rem; position: inherit;">
            Navigation Menu
        </div>
        <?php
        if ($internal_page == "create-menu") {
            $html = '
            <div style="display: contents;">
                <div class="video anim" style="--delay: .4s; margin:0.2rem 0px; ">
                    <div class="video-wrapper"></div>
                    <div class="video-name">
                        <div class="small-header anim" style="--delay: .3s; margin-bottom:0px">
                            <span style="font-size:10px; ">New Website Menu</span><br>
                            Create Navigation Menu
                        </div>
                    </div>
                    <div class="video-view" style="padding: 10px 20px 0px;">
                        Menu\'s help users navigate complex pages and sub structures. 
                    </div>
                    <br>
                    <div class="video-view" style="padding: 10px 20px 0px;">Menu Title</div>
                    <div class="video-name">
                        <div class="search-bar" style="max-width: 100%;">
                            <input placeholder="Menu Title" type="text" id="edtmenu_title" style="background-image: none; max-width: 100%;">
                        </div>
                    </div>
                    <div class="video-name">
                        <div class="small-header anim" style="--delay: .3s; margin-bottom:0px">
                            Menu Item
                        </div>
                    </div>
                    <div class="video-view" style="padding: 10px 20px 0px;"> Menu Item Caption</div>
                    <div class="video-name">
                        <div class="search-bar" style="max-width: 100%;">
                            <input value="Menu Item" placeholder="Menu Caption" type="text" id="edtmenu_caption" style="background-image: none; max-width: 100%;">
                        </div>
                    </div>

                    <div class="video-view" style="padding: 10px 20px 0px;"> Menu Item Link</div>
                    <div class="video-name">
                        <div class="search-bar" style="max-width: 100%;">
                            <input value="#" placeholder="Link To Page" type="text" id="edtmenu_link" style="background-image: none; max-width: 100%;">
                        </div>
                    </div>

            

                    <div style="display: flex; flex-direction: row; justify-content: space-between; margin:10px 20px; ">
                        <button onclick="create_menu_()">Save Data</button>
                    </div>
                    <div class="video-view"></div>
                </div>
            </div>';

            echo $html;
        } else if ($internal_page == "edit-menu") {
            $menu_name = ex(4);
            $sql = "SELECT * FROM `menu` WHERE (`id` = '{$menu_name}')";
            if (!defined('__DATABASE_WEBSITE__')) {
                include_once dirname(dirname(dirname(dirname(__FILE__)))) . DIRECTORY_SEPARATOR . "config.php";
            }

            $db = __DATABASE_WEBSITE__;
            $result = $db->query($sql);
            $nav = "";
            if (isset($result[0])) {
                $contents = $result[0]['data_node'];
                $contents = json_decode($contents, true);
                $contents = $contents[$result[0]['title']];
                $template = '<li class="menu-item" data-id="{ID}"><div><span class="handle">⋮⋮</span> <span class="handle" onclick="alert(`Life`)">Delete</span> <span class="handle">Edit</span></div> {CAPTION}</li>';
                $e_count = 0;
                foreach ($contents as $key => $value) {
                    $e_count += 1;
                    $nav .= str_ireplace(['{ID}', '{CAPTION}', '{LINK}'], [$e_count, $value['caption'], $value['link']], $template);
                }
                $e_count = 0;
            }


            $html = '
    <div style="display: flex; justify-content: space-between;">
        <h2>Edit Your Menu Structure</h2>
        <div style="display: flex; align-content: space-between; align-items: center;">
            <button onclick="add_menu_item(`202`,`Click To Edit Text`)" style="margin: 10px;">Add Menu Item</button>
        </div>
    </div>
        <ul id="draggable-menu" class="menu-list">' . $nav . '</ul>

        <input type="hidden" id="menu-order" name="menu_order" value="">

        <br>
        <button type="submit" id="save-button" onclick="save_menu_()">Save Menu Order</button>

    ';

            echo $html;
        } else {

            $html_template = '
                <div class="responsive anim" style="--delay: .4s;">
                    <div class="gallery">
                        <div class="video-name">
                            <div  onclick="window.location=`' . __PAGE__ . map_page()[2] . '/edit-menu/[ID]/`" class="small-header anim" style="--delay: .3s; font-size:20px; margin: 0px 0px 10px 0px;">
                                <span style="font-size:10px; "># Menu Category</span><br>
                                <div style="display:flex; align-items:center;">
                                    <img style="width:3rem; object-fit: contain; " src="/@rescources/icons/menu-icon/"> 
                                    [TITLE]
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            ';

            if (!defined('__DATABASE_WEBSITE__')) {
                include_once dirname(dirname(dirname(dirname(__FILE__)))) . DIRECTORY_SEPARATOR . "config.php";
            }
            $db = __DATABASE_WEBSITE__;

            $faq_data = $db->query("SELECT * FROM `menu` ORDER BY `id` DESC");
            if (empty($faq_data)) {
                $em = '
                
                <div><div class="anim" style="display: flex; align-items: center; flex-direction: column;"><h2><svg fill="white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" style="height: 15rem;"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M160 96C124.7 96 96 124.7 96 160L96 480C96 515.3 124.7 544 160 544L480 544C515.3 544 544 515.3 544 480L544 160C544 124.7 515.3 96 480 96L160 96zM224 176C250.5 176 272 197.5 272 224C272 250.5 250.5 272 224 272C197.5 272 176 250.5 176 224C176 197.5 197.5 176 224 176zM368 288C376.4 288 384.1 292.4 388.5 299.5L476.5 443.5C481 450.9 481.2 460.2 477 467.8C472.8 475.4 464.7 480 456 480L184 480C175.1 480 166.8 475 162.7 467.1C158.6 459.2 159.2 449.6 164.3 442.3L220.3 362.3C224.8 355.9 232.1 352.1 240 352.1C247.9 352.1 255.2 355.9 259.7 362.3L286.1 400.1L347.5 299.6C351.9 292.5 359.6 288.1 368 288.1z"></path></svg></h2><h2>No Menu Items</h2><br>No Data Available</div></div>
                <div style="display: flex;flex-direction: column;align-items: center;padding: 2rem;">
                        <button onclick="window.location = `create-menu/`">Create Menu</button>
                    </div>';
                echo $em;
            } else {
                $html = '
                <div class="anim" style="padding: 10px 5px 0px; --delay: .4s;">
                    <div style="display: flex; flex-direction: row-reverse; justify-content: space-between; margin:10px 0px; ">
                        <button onclick="window.location=`' . __PAGE__ . map_page()[2] . '/create-menu/' . '`">
                            Create Menu
                        </button>
                    </div>
                </div>
                <div>';
                foreach ($faq_data as $_data) {
                    $html .= str_replace(
                        ['[ID]', '[TITLE]'],
                        [$_data['id'], $_data['title']],
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

<script>

    function add_menu_item(id, caption) {
        let template = '<li class="menu-item" data-id="' + id + '"><span class="handle">⋮⋮</span><p style="margin: 0px;" onclick="ed()">' + caption + '</p></li>';
        let menu_container = document.getElementById('draggable-menu');
        let prior_data = menu_container.innerHTML;
        menu_container.innerHTML = prior_data + template;
    }

    function ed() {
        let name = window.prompt('The Menu Caption');
        let man = add_menu_item_('<?php echo ex(4); ?>', name, '#');
    }

    async function add_menu_item_(id, caption, link) {
        operate_loader();
        const data = new URLSearchParams();
        data.append('request', 'add-menu-item');
        data.append('menu_id', id);
        data.append('menu_caption', caption);
        data.append('menu_link', link);


        let registration_confirmation = await sendAndReceiveData(data, "<?php echo __PROTOCOL__ . __DOMAIN_NAME__ . '/@scripts/scripts.php'; ?>");
        try {
            registration_confirmation = JSON.parse(registration_confirmation);
            operate_loader('stop');
            if (registration_confirmation.success) {
                success_feedback('Menu Item Saved');
                window.location = "<?php echo __PAGE__ . map_page()[2]."/".map_page()[3]."/".map_page()[4]; ?>/";
            } else {
                error_feedback(registration_confirmation.message);
            }
        } catch (error) {
            error_feedback('Failed To Add Menu Item');
            operate_loader('stop');
        }
    }

    async function create_menu_() {
        operate_loader();
        const title = document.getElementById("edtmenu_title").value;
        const caption = document.getElementById("edtmenu_caption").value;
        const link = document.getElementById("edtmenu_link").value;

        if (title.trim() === "" || caption.trim() === "") {
            operate_loader("stop");
            error_feedback('Please fill in fields before saving.');
            return;
        }
        const data = new URLSearchParams();
        data.append('request', 'create-menu');
        data.append('menu_name', title);
        data.append('menu_caption', caption);
        data.append('menu_link', link);


        let registration_confirmation = await sendAndReceiveData(data, "<?php echo __PROTOCOL__ . __DOMAIN_NAME__ . '/@scripts/scripts.php'; ?>");
        try {
            registration_confirmation = JSON.parse(registration_confirmation);
            operate_loader('stop');
            if (registration_confirmation.success) {
                success_feedback('Image Saved');
                window.location = "<?php echo __PAGE__ . map_page()[2]; ?>/";
            } else {
                error_feedback(registration_confirmation.message);
            }
        } catch (error) {
            error_feedback();
            operate_loader('stop');
        }
    }

    async function save_menu_() {
        // var menuItems = document.querySelectorAll('#menu-item');
        var menuItems = document.querySelectorAll(".menu-item");
        var orderArray = [];

        menuItems.forEach(function (item) {
            // Get the 'data-id' attribute for each item
            orderArray.push(item.getAttribute('data-id'));
        });

        // The orderArray will look like: ["3", "1", "4", "2"] (if they were reordered)
        // A comma-separated string is simple and common for this purpose: "3,1,4,2"
        var serializedOrder = orderArray.join(',');

        document.getElementById('menu-order').value = serializedOrder;

        operate_loader();
        const menu_order_ = document.getElementById("menu-order").value;

        const data = new URLSearchParams();
        data.append('request', 'rearange-menu');
        data.append('menu_order', menu_order_);
        data.append('menu_id', '<?php echo ex(4) ?>');


        let registration_confirmation = await sendAndReceiveData(data, "<?php echo __PROTOCOL__ . __DOMAIN_NAME__ . '/@scripts/scripts.php'; ?>");
        try {
            registration_confirmation = JSON.parse(registration_confirmation);
            operate_loader('stop');
            if (registration_confirmation.success) {
                success_feedback('Menu Saved');
                window.location = "<?php echo __PAGE__ . map_page()[2]; ?>/";
            } else {
                error_feedback(registration_confirmation.message);
            }
        } catch (error) {
            error_feedback();
            operate_loader('stop');
        }

    }

    async function delete_menu_(menu_item) {
        operate_loader();
        const data = new URLSearchParams();
        data.append('request', 'rearange-menu');
        data.append('menu_id', '<?php echo ex(4); ?>');
        data.append('menu_item', menu_item);

        let registration_confirmation = await sendAndReceiveData(data, "<?php echo __PROTOCOL__ . __DOMAIN_NAME__ . '/@scripts/scripts.php'; ?>");
        try {
            registration_confirmation = JSON.parse(registration_confirmation);
            operate_loader('stop');
            if (registration_confirmation.success) {
                success_feedback('Menu Saved');
                window.location = "<?php echo __PAGE__ . map_page()[2]; ?>/";
            } else {
                error_feedback(registration_confirmation.message);
            }
        } catch (error) {
            error_feedback();
            operate_loader('stop');
        }

    }

</script>

<script>
    // 1. Initialize SortableJS on the menu list
    var el = document.getElementById('draggable-menu');
    var sortable = new Sortable(el, {
        animation: 150, // Smoothness of the transition
        handle: '.handle', // Only drag when clicking the handle (optional)
        ghostClass: 'sortable-ghost' // Class applied to the element being dragged
    });

</script>