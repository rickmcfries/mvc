
<h1>Wellcome</h1>
    
<div class="wrapper">
    <div class="Name title">Name</div>
    <div class="Description title">Description</div>
    <div class="Price title">Price</div>
    <div class="title">Update</div>
    <div class="title">Delete</div>
        <?php 
            $item = new Item();
            foreach($this->data as $row){
            $item = $row;
        ?>       
     
        <div class="Name"><?php echo $item->name;?></div>
        <div class="Description"><?php echo $item->description;?></div>
        <div class="Price"><?php echo $item->price;?></div>
        <a href="<?php echo constant('URL').'main/getItem/'.$item->name;?>"><i class="flaticon-processing"></i></a>
        <a href="<?php echo constant('URL').'main/deleteItem/'.$item->name;?>"><span>X</span></a>
        <?php } ?>

</div>
