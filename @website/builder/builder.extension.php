<?php 
# Construct The Website Webpage From The Theme Interface
construct_page(); 
?>

<div id="catch_block_container"></div>

<script>
    function catch_element_block(){
        let e = document.getElementById('catch_block_container'); 
        let data_contents = `
        
      <div></div>
      <div class="container py-vh-4 position-relative mt-5 px-vw-5 text-center">
        <div class="row d-flex align-items-center justify-content-center py-vh-5">
          <div class="col-12 col-xl-10">
            <span class="h5 text-secondary fw-lighter">You are lost</span>
            <h1 class="display-huge mt-3 mb-3 lh-1">Page Does Not Exists</h1>
          </div>
          <div class="col-12 col-xl-8">
            <p class="lead text-secondary">Sorry, the page you are looking for does not exist.</p>
          </div>
          <div class="col-12 text-center">
            <a href="/home" class="btn btn-xl btn-light">Back to Home
            </a>
          </div>
        </div>
      </div>

    
        `;
        e.innerHTML = data_contents; 
    }


   // catch_element_block(); 
</script>
