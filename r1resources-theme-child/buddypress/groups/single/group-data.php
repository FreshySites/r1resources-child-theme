<?php
// GROUP QB DATA - EMK 2/7/22

$uid = get_current_user_id();
$groupID = bp_get_group_id();

$federaltaxid = get_field('federal_tax_id', 'group_'.$groupID);
$crs = get_field('crs', 'group_'.$uid);
$mlsofficecode = get_field('mls_office_code', 'group_'.$groupID);
$qbemail = get_field('qb_email', 'group_'.$groupID);
$qbphone = get_field('qb_phone', 'group_'.$groupID);
$qblicensenumber = get_field('qb_license_number', 'group_'.$groupID);
$officestatelicensenumber = get_field('office_state_license_number', 'group_'.$groupID);
$doorcodes = get_field('door_codes', 'group_'.$groupID);
$w9 = get_field('w9', 'group_'.$groupID);
$officelogo = get_field('office_logo', 'group_'.$groupID);
$brokerstitle = get_field('brokers_title', 'group_'.$groupID);
$complianceurl = get_field('compliance_url', 'group_'.$groupID);
$compliancemethod = get_field('compliance_method', 'group_'.$groupID);
$grossreceiptscashletter = get_field('gross_receipts_cash_letter', 'group_'.$groupID);
$preferredmortgagebroker = get_field('preferred_mortgage_broker', 'group_'.$groupID);
$NAIDS = get_field('naids', 'group_'.$groupID);
$HUDID = get_field('hud_id', 'group_'.$groupID);
$officeaddress = get_field('office_address', 'group_'.$groupID);
$officephone = get_field('office_phone', 'group_'.$groupID);
$compliancemanagername = get_field('compliance_manager_name', 'group_'.$groupID);
$compliancemanageremail = get_field('compliance_manager_email', 'group_'.$groupID);
$compliancemanagerphone = get_field('compliance_manager_phone', 'group_'.$groupID);
$preferredpropertymanager = get_field('preferred_property_manager', 'group_'.$groupID);
?>

<style>
.wp-block-columns {margin:0 !important;}
.column-attribute {font-weight:bold;}
</style>

<h2>My Office Information</h2>
<div class="wp-block-columns">
<div class="wp-block-column column-attribute" style="flex-basis:250px;">MLS Office Code:</div><div class="wp-block-column"><?php echo $mlsofficecode; ?></div>
</div>
<div class="wp-block-columns">
    <div class="wp-block-column column-attribute" style="flex-basis:250px;">Office State License #:</div><div class="wp-block-column"><?php echo $officestatelicensenumber; ?></div>
</div>
<div class="wp-block-columns">
    <div class="wp-block-column column-attribute" style="flex-basis:250px;">HUD ID:</div><div class="wp-block-column"><?php echo $HUDID; ?></div>
</div>
<div class="wp-block-columns">
<div class="wp-block-column column-attribute" style="flex-basis:250px;">Federal Tax ID:</div><div class="wp-block-column"><?php echo $federaltaxid; ?></div>
</div>
<div class="wp-block-columns">
    <div class="wp-block-column column-attribute" style="flex-basis:250px;">Office Door Code(s):</div><div class="wp-block-column"><?php echo $doorcodes; ?></div>
</div>
<div class="wp-block-columns">
    <div class="wp-block-column column-attribute" style="flex-basis:250px;">Office Address:</div><div class="wp-block-column"><?php echo $officeaddress; ?></div>
</div>
<div class="wp-block-columns">
    <div class="wp-block-column column-attribute" style="flex-basis:250px;">Office Phone:</div><div class="wp-block-column"><?php echo $officephone; ?></div>
</div>
<p><hr /></p>
<h2>My <?php echo $brokerstitle; ?>'s Information</h2>
<div class="wp-block-columns">
<div class="wp-block-column column-attribute" style="flex-basis:250px;"><?php echo $brokerstitle; ?>'s License #:</div><div class="wp-block-column"><?php echo $qblicensenumber; ?></div>
</div>
<div class="wp-block-columns">
    <div class="wp-block-column column-attribute" style="flex-basis:250px;">QB NAR #:</div><div class="wp-block-column"><?php echo $NAIDS; ?></div>
</div>
<div class="wp-block-columns">
<div class="wp-block-column column-attribute" style="flex-basis:250px;"><?php echo $brokerstitle; ?>'s Email:</div><div class="wp-block-column"><a href='mailto:<?php echo $qbemail; ?>'><?php echo $qbemail; ?></a></div>
</div>
<div class="wp-block-columns">
<div class="wp-block-column column-attribute" style="flex-basis:250px;"><?php echo $brokerstitle; ?>'s Phone:</div><div class="wp-block-column"><?php echo $qbphone; ?></div>
</div>
<div class="wp-block-columns">
<div class="wp-block-column column-attribute" style="flex-basis:250px;">W9 Form:</div><div class="wp-block-column"><a href='<?php echo $w9; ?>' target="_blank"><i> <i class="fa fa-file-pdf"></i> Click to Download</i></a></div>
</div>
<div class="wp-block-columns">
<div class="wp-block-column column-attribute" style="flex-basis:250px;">GRT Letter:</div><div class="wp-block-column"><a href='<?php echo $grossreceiptscashletter; ?>' target="_blank"><i> <i class="fa fa-file-pdf"></i> Click to Download</i></a></div>
</div>
<div class="wp-block-columns">
<div class="wp-block-column column-attribute" style="flex-basis:250px;">Office Logo:</div><div class="wp-block-column"><a target="_blank" href='<?php echo $officelogo; ?>'><i><i class="fa fa-file-image"></i> Click to Download</i></a></div>
</div>
<div class="wp-block-columns">
<a window="_new" href='<?php echo $officelogo; ?>'><img style="width:25%;" class="" src="<?php echo $officelogo; ?>" /></a></div>

<p><hr /></p>
<h2>Compliance Information</h2>
<div class="wp-block-columns">
<div class="wp-block-column column-attribute" style="flex-basis:250px;">Compliance Method:</div><div class="wp-block-column"><a target="_blank" href='<?php echo $complianceurl; ?>'><i class="fa fa-external-link-alt"></i> <?php echo $compliancemethod; ?></a></div>
</div>
<div class="wp-block-columns">
    <div class="wp-block-column column-attribute" style="flex-basis:250px;">Compliance Manager Name:</div><div class="wp-block-column"><?php echo $compliancemanagername; ?></div>
</div>
<div class="wp-block-columns">
    <div class="wp-block-column column-attribute" style="flex-basis:250px;">Compliance Manager Email:</div><div class="wp-block-column"><a href="mailto:<?php echo $compliancemanageremail; ?>"><?php echo $compliancemanageremail; ?></a></div>
</div>
<div class="wp-block-columns">
    <div class="wp-block-column column-attribute" style="flex-basis:250px;">Compliance Manager Phone:</div><div class="wp-block-column"><?php echo $compliancemanagerphone; ?></div>
</div>

<p><hr /></p>
<h2>Preferred Resources</h2>
<div class="wp-block-columns">
    <div class="wp-block-column column-attribute" style="flex-basis:250px;">Mortgage Broker:</div><div class="wp-block-column"><a target="_blank" href='<?php echo $preferredmortgagebroker; ?>'><i class="fa fa-external-link-alt"></i> <?php echo $preferredmortgagebroker; ?></a></div>
</div>
<div class="wp-block-columns">
    <div class="wp-block-column column-attribute" style="flex-basis:250px;">Property Manager:</div><div class="wp-block-column"><a target="_blank" href='<?php echo $preferredpropertymanager; ?>'><i class="fa fa-external-link-alt"></i> <?php echo $preferredpropertymanager; ?></a></div>
</div>
<div class="wp-block-columns">
    <div class="wp-block-column column-attribute" style="flex-basis:250px;">Commercial Real Estate:</div><div class="wp-block-column"><a href="https://r1commercial.com/" target="_blank"><i class="fa fa-external-link-alt"></i> R1 Commercial</a></div>
</div>
<div class="wp-block-columns">
    <div class="wp-block-column column-attribute" style="flex-basis:250px;">Printing Services:</div><div class="wp-block-column"><a href="https://groovymooseprinting.com/" target="_blank"><i class="fa fa-external-link-alt"></i> Groovy Moose Printing</a></div>
</div>
