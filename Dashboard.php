<!DOCTYPE html>
<? 

include $_SERVER['DOCUMENT_ROOT'] . "/inc/Controllers/DashboardController.php";
if (!isset($_SESSION['User'])) {
  header("Location: /");
  die();
}

?>
<? include $PageHeader ?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Page Header
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <section class="content">

  
    </section>
  </div>
  
<? include $PageFooter ?>
