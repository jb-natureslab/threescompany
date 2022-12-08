 <?php
    echo $HTML->side_panel_start();

    echo $HTML->side_panel_end();
    
    echo $HTML->title_panel([
    'heading' => $details['name'].' - Sick Days',
    'button'  => [
            'text' => $Lang->get('Sick Day'),
            'link' => $API->app_nav().'/staff/sick-days/add?id='.$_GET['id'],
            'icon' => 'core/plus',
        ],
    ], $CurrentUser);

    $Smartbar = new PerchSmartbar($CurrentUser, $HTML, $Lang);

	$Smartbar->add_item([
	    'active' => false,
	    'title' => 'Profile',
	    'link'  => $API->app_nav().'/staff/edit/?id='.$staffID,
	]);
	
	$Smartbar->add_item([
	    'active' => false,
	    'title' => 'Hours',
	    'link'  => $API->app_nav().'/staff/hours/?id='.$staffID,
	]);
	
	$Smartbar->add_item([
    'active' => false,
    'title' => 'Holidays',
    'link'  => $API->app_nav().'/staff/holidays/?id='.$staffID,
	]);
	
	$Smartbar->add_item([
	    'active' => true,
	    'title' => 'Sick Days',
	    'link'  => $API->app_nav().'/staff/sick-days/?id='.$staffID,
	]);
	
	$Smartbar->add_item([
	    'active' => false,
	    'title' => 'Compassionate Leave',
	    'link'  => $API->app_nav().'/staff/compassionate-leave/?id='.$staffID,
	]);
	
	$Smartbar->add_item([
	    'active' => false,
	    'title' => 'Volunteer Days',
	    'link'  => $API->app_nav().'/staff/volunteer-days/?id='.$staffID,
	]);
	
	echo $Smartbar->render();

    echo $HTML->main_panel_start(); 
    
    ?>

	<table class="d">
        <thead>
            <tr>
                <th>Date</th> 
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
<?php
    foreach($sickdays as $SickDay) {

?>
            <tr>
                <td><?php echo $SickDay['date']; ?></td>
                <td><a href="<?php echo $HTML->encode($API->app_path()); ?>/staff/sick-days/delete/?id=<?php echo $_GET['id']; ?>&sickdayID=<?php echo $HTML->encode(urlencode($SickDay['natures_laboratory_staff_sickdayID'])); ?>" class="delete inline-delete"><?php echo 'Delete'; ?></a></td>
            </tr>
<?php
	}
?>
        </tbody>
	</table>

<?php 

    echo $HTML->main_panel_end();