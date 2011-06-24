<?php
?>
<body>
<div id=wrapper>
<?php
$this->load->view('header.php');
$this->load->view('sidebar.php');
$this->load->view($main_view);
$this->load->view('footer.php');
?>