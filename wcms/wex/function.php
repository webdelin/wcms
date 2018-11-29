<?php
/**
 * WCMS - WEX Simple CMS
 * https://github.com/wexcms/wcms
 * Copyright (C) 2018 Evgenii Vedegis <vedegis@gmail.com>
 * https://github.com/vedees/wcms/blob/master/LICENSE
 */

//* Basic functions
 function redirect_to($url) {
	header('Location: ' . $url);
	exit;
}

//* Get html file to editing
function get_html_name () {
  if (isset($_POST['pagename'])) {
    $_SESSION['pagename'] = $_POST['pagename'];
  };
  if (isset($_SESSION['pagename'])) {
    $pagename = $_SESSION['pagename'];
  } else {
    // POST Error
    $pagename = 'index.html';
  };
  // Template set page name
  return $template = file_get_contents($pagename);
}

function get_html_select () {
  $html_list = glob("../*.html");
  $html_selected='';
  for ($i = 0; $i < count($html_list); $i++) {
    if($html_list[$i] == $_SESSION['pagename']) {
      $html_selected.=('<option selected>'.$html_list[$i].'</option>');
    } else {
      $html_selected.=('<option>' . $html_list[$i] . '</option>');
    };
  };
  return $html_selected;
}

// nav active
function nav_is_active ($page, $name) {
  if ($page == $name) return true;
}