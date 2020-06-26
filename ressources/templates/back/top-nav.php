<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index.php">Admin</a>
</div>

<!-- Top Menu Items -->
<ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['Adminname']; ?>  </a></li>
      <li><a href ="../index.php?logout='1'"><span class="glyphicon glyphicon-log-in"></span> logout</a></li>
    </ul>