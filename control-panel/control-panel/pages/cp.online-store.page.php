<?php
$internal_page = map_page()[3] ?? false;
if (empty($internal_page)) {
    $internal_page = "dashboard";
}
?>

<style>
    button{
        margin:auto; 
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
                <span style="font-size:10px; ">Site Web Store</span><br>
                Online Shop Page
            </div>
            <br><span class="" style="font-size: 10px;">Manage your websites online store.</span>
        </div>
        <br>

        <div class="main-header anim" style="--delay: 0s; text-align: center; padding: 1rem 3rem; position: inherit;">
            Store Inventory
        </div>

        <div>
            <div class="responsive anim" style="--delay: .4s;">
                <div class="gallery">
                    <div style="background-color: #242424; padding: 10px;">

                        <h1
                            style="display: flex; flex-direction: row; justify-content: center; align-items: center; align-content: space-between;">
                            Products
                        </h1>
                        <button onclick="window.location = '<?php echo change_page('inventory') ?>'">Manage Products</button>
                    </div>
                </div>
            </div>

            <div class="responsive anim" style="--delay: .4s;">
                <div class="gallery">
                    <div style="background-color: #242424; padding: 10px;">

                        <h1
                            style="display: flex; flex-direction: row; justify-content: center; align-items: center; align-content: space-between;">
                            Categories
                        </h1>
                        <button onclick="window.location = '<?php echo change_page('category') ?>'">Manage Categories</button>
                    </div>
                </div>
            </div>

            <div class="responsive anim" style="--delay: .4s;">
                <div class="gallery">
                    <div style="background-color: #242424; padding: 10px;">

                        <h1
                            style="display: flex; flex-direction: row; justify-content: center; align-items: center; align-content: space-between;">
                            Brands
                        </h1>
                        <button onclick="window.location = '<?php echo change_page('brands') ?>'">View Page</button>

                    </div>
                </div>
            </div>
        </div>

        <div class="main-header anim" style="--delay: 0s; text-align: center; padding: 1rem 3rem; position: inherit;">
            Store Sales
        </div>

        <div>
            <div class="responsive anim" style="--delay: .4s;">
                <div class="gallery">
                    <div style="background-color: #242424; padding: 10px;">

                        <h1
                            style="display: flex; flex-direction: row; justify-content: center; align-items: center; align-content: space-between;">
                            Orders
                        </h1>
                        <button onclick="window.location = '<?php echo change_page('inventory') ?>'">Manage Products</button>
                    </div>
                </div>
            </div>

            <div class="responsive anim" style="--delay: .4s;">
                <div class="gallery">
                    <div style="background-color: #242424; padding: 10px;">

                        <h1
                            style="display: flex; flex-direction: row; justify-content: center; align-items: center; align-content: space-between;">
                            Promotions
                        </h1>
                        <button onclick="window.location = '<?php echo change_page('inventory') ?>'">Manage Products</button>
                    </div>
                </div>
            </div>

            <div class="responsive anim" style="--delay: .4s;">
                <div class="gallery">
                    <div style="background-color: #242424; padding: 10px;">

                        <h1
                            style="display: flex; flex-direction: row; justify-content: center; align-items: center; align-content: space-between;">
                            Coupons
                        </h1>
                        <button onclick="window.location = '<?php echo change_page('category') ?>'">Manage Categories</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>