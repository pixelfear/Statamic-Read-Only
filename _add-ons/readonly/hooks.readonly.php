<?php
class Hooks_readonly extends Hooks
{
	function control_panel__add_to_head()
	{
		if (URL::getCurrent() == '/publish') {
			return $this->css->link('readonly.css');
		}
	}
}