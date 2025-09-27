<div class="wrapper" style="overflow: auto">
    <?php include_once "blade.navbar.sidebar.php"; ?>
    <div class="main-container" id="application_canvas" style="overflow: visible">

        <div class="main-header anim" style="--delay: 0s; text-align: center; padding: 1rem 3rem">
        </div>
  
        <div> 
            <div class="main-header anim" style="--delay: 0s; text-align: center; padding: 1rem 3rem">
                Website Builder
            </div>
        </div>

        <div class="main-blog anim"
            style="--delay: 0.1s; width: 100%; height: max-content; background-color: bisque; background: linear-gradient(181deg, #8e8e8f, transparent); margin: 1rem 0rem;">
            <div>
                <img src="/@rescources/site/website-builder-screenshot/">
                <div class="author-detail">
                    <div class="author-name" >Website Builder: VM-EDITOR</div>
                    <div class="author-info">
                        Edit your website source codes and customise to your liking. 
                    </div>
                </div>
                <br>
                <button onclick="window.location = '<?php echo __PROTOCOL__.__DOMAIN_NAME__ ?>/vm-editor/'">Launch Builder</button>
            </div>

            <div class="main-blog__time">Github Control</div>
        </div>

    </div>
</div>