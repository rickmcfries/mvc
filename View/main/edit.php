
<div class="container">
        <h1>Edit "<?php echo $this->item->name;?>"</h1>.
        <div class="message"><?php echo $this->message;?></div>
        <form action="<?php echo constant('URL');?>/main/updateItem" method="POST">
            <br>
            <input type="text" name="name" placeholder="Item name" required disabled value="<?php echo $this->item->name;?>"/><br>
            <input type="text" name="description" placeholder="Item description"  required/><br>
            <input type="number"   name="price" placeholder="Price" required/><br>
            <input type="submit" value="Update">
            <br>
        </form>
</div>
  
