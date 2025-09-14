<?php
if (!isset($header) || !isset($sub_header)) {
    die('Error: Missing required variables');
}
?>
<div class="full-screen column center">
    <h1 class="text-banner center-text"><?php echo $header; ?></h1>
    <h2 class="text-header"><?php echo $sub_header; ?></h2>
</div>