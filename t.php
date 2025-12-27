<?php
$template = "C:\Users\Hastings\Documents\\vm.makhesa\@website\\themes\agency\\footer.card";

$e = template_pallete_scraper($template); 

print_r($e); 
die(0);

#How The Scraping Process Works 
# 1. First Find The Page 
# 2. Second Find The Sections/Containers along with their id 
# 3. Third Find All the elements in the sections 
$db_cell = [];
$id = "Pricing & Category";
$section_id = "Pricing Container";

$db_cell[$id] = [];
$db_cell[$id][$section_id] = [];
$db_cell[$id][$section_id]['Text'] = "text";
$db_cell[$id][$section_id]['thuggin'] = "image";
$db_cell[$id][$section_id]['Text'] = "text";
$db_cell[$id][$section_id]['image id'] = "image";
$db_cell[$id][$section_id]['Text'] = "text";
# Data Format 


print_r($db_cell);

?>