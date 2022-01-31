<?php  
			require_once('setting.php');
		    
		 	global $smarty;
			// For maintenance;
		//	$page = (isset($_REQUEST['sitemode']) && $_REQUEST['sitemode']=="index")?"index":"maintenance";
		$redirect_page =  !empty($_SERVER['HTTP_REFERER'])?basename($_SERVER['HTTP_REFERER']):"dashboard.php";
			// For start
			$page = (isset($_REQUEST['sitemode']) && $_REQUEST['sitemode']=="maintenance")?"maintenance":"index";
			
            if(!isset($_SESSION['Name'])){
				$smarty->assign('redirectpage',$redirect_page);
		    	$smarty->display($page.'.tpl');
			}else{
				header("location:dashboard.php");
			}


?>