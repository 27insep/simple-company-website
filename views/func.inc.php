	<?php
	if(isset($form_data))
	{
		$GLOBALS['form_data']	=	$form_data;
	}
	function print_input_box($name,$type)
	{
		$value	=	"";
		if(isset($GLOBALS['form_data']))
		{
			$value	=	$GLOBALS['form_data'][$name];
		}
		echo '<input type="'.$type.'" name="'.$name.'" id="'.$name.'" class="form-control" value="'.$value.'"/>';
	}
	function print_input_text($name)
	{
		print_input_box($name,"text");
	}
	function print_input_password($name)
	{
		print_input_box($name,"password");
	}
	function print_input_hidden($name)
	{
		print_input_box($name,"hidden");
	}
	?>