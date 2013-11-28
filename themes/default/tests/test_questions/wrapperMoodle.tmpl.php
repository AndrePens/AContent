<<?php echo '?'; ?>xml version="1.0" encoding="<?php echo $this->encoding; ?>"<?php echo '?'; ?>>
   
<quiz>
<!-- Insertion in the category -->
<question type="category">
    <category>
        <text>$course$/Default</text>
    </category>
</question>

<!-- Here we will put the data of the question -->
<?php echo $this->xml_content; ?>

</quiz>
