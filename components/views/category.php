<div>
  <h3>Categories</h3>
      <ul>
  <?php foreach ($model as $value) {?>
      <li>
        <a href="index?category=<?php echo ($value->id); ?>"><?php echo ($value->category_name); ?></a>
      </li>
  <?php } ?>
      <li>
        <a href="/category/index">Category Redactor</a>
      </li>
    </ul>
</div>
