<?php
/*
 * Template name: No Sidebar 2
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BuddyBoss_Theme
 */

get_header();
?>

<style>
.wp-block-columns {margin-bottom:0;padding-bottom:15px;margin-top:0;padding-top:0;padding-left:25px;padding-right:25px;}
</style>

<div id="primary" class="content-area bb-grid-cell" style="max-width:2200px;">
	<main id="main" class="site-main">

  <h2>R1 Companies Office List</h2>
  <form action="" method="post">
    <select id="selectoffice" name="selectoffice">
      <option value="">Select Office</option>
<?php
   
   $conn = new mysqli('localhost',DB_USER,DB_PASSWORD,DB_NAME);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM `yjk_wpdatatable_7`";
    $result = $conn->query($sql);
    while ($row = $result->fetch_array(MYSQLI_ASSOC)){
      $officeshortname = $row['officeshortname'];
      $officenumber = $row['wdt_ID'];
      echo "<option value='$officenumber'>$officeshortname</option>";
    }

?>
 
    </select>
  </form>
  <!-- OFFICE LIST -->
  <figure class="wp-block-table is-style-stripes">
    <table class="has-fixed-layout" style="overflow: hidden;">
      <tbody>
<?php
    // INDIVIDUAL OR FULL LIST?
    $sql = "SELECT * FROM `yjk_wpdatatable_7`";
    if( $_POST["selectoffice"] <> "") {
      $sql = $sql." WHERE wdt_ID=".$_POST['selectoffice'];
    }
    $result = $conn->query($sql);
    while ($row = $result->fetch_array(MYSQLI_ASSOC)){
      $nmrecregisteredname = $row['nmrecregisteredname'];
      $officeshortname = $row['officeshortname'];
      $qbname = $row['qbname'];
      $officelicense = $row['officelicense'];
      $mlsofficeid = $row['mlsofficeid'];
      $physicaladdress = $row['physicaladdress'];
      $physicaladdress = $row['physicaladdress'];
      $physicalcity = $row['physicalcity'];
      $physicalstate = $row['physicalstate'];
      $physicalzipcode = $row['physicalzipcode'];
      $officephone = $row['officephone'];
      $mailingaddress = $row['mailingaddress'];
      $mailingcity = $row['mailingcity'];
      $mailingstate = $row['mailingstate'];
      $mailingzipcode = $row['mailingzipcode'];
      $officelogo = $row['officelogo'];
      $r1resourcesgroupname = $row['r1resourcesgroupname'];

  ?>
        <tr>
          <td>
			<div class="wp-block-columns is-stacked-on-mobile">
              <div class="wp-block-column">
            		<h4 style="margin-bottom:0;"><b><?php  echo $officeshortname; ?></b> (<?php  echo $nmrecregisteredname; ?>)</h4>
			  </div>
			</div>
            <div class="wp-block-columns is-stacked-on-mobile">
              <div class="wp-block-column"><b>Office Designated Broker</b><br /><?php  echo $qbname; ?></div>
              <div class="wp-block-column"><b>Office License#</b><br /><?php  echo $officelicense; ?></div>
              <div class="wp-block-column"><b>MLS ID</b><br /><?php  echo $mlsofficeid; ?></div>
              <div class="wp-block-column"><b>Office Website</b><br /><i class="fa fa-external-link-alt"></i> <a href="<?php  echo $r1resourcesgroupname; ?>"><?php  echo substr($r1resourcesgroupname, 8, 25); ?>...</a></div>
            </div>

			<div class="wp-block-columns is-stacked-on-mobile">
				<div class="wp-block-column"><b>Physical Address</b><br />
				 	<?php echo $physicaladdress;?><br />
					<?php echo $physicalcity;?>, <?php echo $physicalstate;?> <?php echo $physicalzipcode;?><br>
					<?php echo $officephone;?><br>
				</div>
				<div class="wp-block-column"><b>Mailing Address</b><br />
					<?php echo $mailingaddress;?><br />
					<?php echo $mailingcity;?>, <?php echo $mailingstate;?> <?php echo $mailingzipcode;?><br>
				</div>
				<div class="wp-block-column"><b>Office Logo</b><br />
					<a href="<?php echo $officelogo;?>"><img target="_new" src="<?php echo $officelogo;?>"></a></div>
				<div class="wp-block-column"></div>
			</div>
          
          </td>
        </tr>

  <?php
    }
    
$conn->close();
  
   ?>
      </tbody>
    </table>
  </figure>
</main><!-- #main -->
</div><!-- #primary -->

<script>
  jQuery(function() {
      jQuery('#selectoffice').change(function() {
          this.form.submit();
      });
  });
</script>

<?php
get_footer();
