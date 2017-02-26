<div>
  <h3>Categories</h3>
  <?php foreach ($model as $value) {?>
    <ul>
      <li>
        <a href="index?category=<?php echo ($value->id); ?>"><?php echo ($value->category_name); ?></a>
      </li>
    </ul>
  <?php } ?>
</div>
