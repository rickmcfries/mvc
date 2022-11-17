
<div class="container">
        <h1>Add new item</h1>.
        <div class="message"><?php echo $this->message;?></div>
        <form action="<?php echo constant('URL');?>/add/newItem" method="POST">
            <br>
            <input type="text" name="name" placeholder="Item name" required/><br>
            <input type="text" name="description" placeholder="Item description" required/><br>
            <input type="number"   name="price" placeholder="Price" required/><br>
            <input type="submit" value="Add">
            <br>
        </form>
</div>
  
