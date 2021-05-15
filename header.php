
<div class="header">
  <div class="nav-top-bar"></div>
  <div class="nav-mid-bar"></div>
  <div class="nav-mid-bar__menu" onclick="dropdownmenu()">
    <span class="menu__button" ></span>
    <div class="menu__dropdown" id="menu__dropdown">
      <a href="index.php">Home</a>
      <a href="questions.php">Questions</a>
      <a href="tags.php">Tags</a>
      <a href="users.php">Users</a>
    </div>
 </div>
 <div class="nav-mid-bar__img">
   <a href="index.php">
     <img src="img/logo_36.png" alt="">
   </a>
 </div>
 <div class="nav-mid-bar__searchbar">
  <div class="nav-mid-bar__searchbar-div">
      <input type="text" name="research" id="research" placeholder="Recherchez..." class="searchbar__input">
      <button type="submit" class="searchbar__button" name="submit"><i class="fas fa-search"></i></button>
  </div>
  </div>
  <div class="nav-mid-bar__visitor">
    <?php
    if (!isset($_SESSION['displayname'])){
      $header_file = "header_visitor.php";
    }else{
      $header_file = "header_log.php";
    }
    require_once ($header_file);
   ?>
  </div>
  <div class="nav-mid-bar-end"></div>
</div>
<script src="js/app.js"></script>
