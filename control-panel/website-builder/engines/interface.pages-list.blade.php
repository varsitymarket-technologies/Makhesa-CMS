<div class="content" style="align-items: normal; padding: 20px; overflow: hidden; display: blocks;">
    <div class="content-area-wrapper">
        <div>
            <h2 style="color: #4d4f60;">Website Pages</h2>
            <p>Manage Your Website Pages.</p>
        </div>

        <?php
        $sql = "SELECT * FROM `tblcanvas`"; 
        $e = __DATABASE_ENGINE__->query($sql); 
        foreach ($e as $page_data) {

            #Array ( [id] => 1 [board] => vm_theme_68ff407d27e6a [title] => Home Page [url] => goofy [description] => The Website Page Desciption [seo] => { "description": "The Website Page Desciption" } [keywords] => Site Things Right )

            $template = '
            <div onclick="window.location=`'.__PROTOCOL__.__DOMAIN_NAME__.'/vm-editor/code-editor/'.$page_data['id'].'`" style="padding: 4px 0px">
                <div style="border-width: thick; border-color: #6130aa4d; border-style: solid; padding: 1rem; border-radius: 1rem;">
                    <h2 style="font-size: 1.6rem; color: aliceblue;">'.$page_data['title'].'</h2>
                    <p>URL https: '.$page_data['url'].' </p>
                </div>
            </div>
            '; 
            echo $template; 
        }
        ?>

    </div>
</div>