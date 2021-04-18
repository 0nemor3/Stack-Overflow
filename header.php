<div class="header">
  <div class="nav-top-bar"></div>
  <div class="nav-mid-bar">
  	<a class="nav-mid-bar__menu">
     <i class="fas fa-bars"></i>
   </a>
   <a class="nav-mid-bar__img" href="index.php">
     <span></span>
   </a>
   <form class="nav-mid-bar__searchbar">
    <input type="text" name="research" id="research" placeholder="Recherchez..." class="searchbar__input">
    <button type="submit" class="searchbar__button" name="submit"><i class="fas fa-search"></i></button>
  </form>
  <?php
 // $SESSION['displayname'] = "Louka";
    if (!isset($SESSION['displayname'])){
      $header_file = "header_visitor.php";
    }else{
      $header_file = "header_log.php";
    }
    require_once ($header_file);
   ?>
</div>
</div>