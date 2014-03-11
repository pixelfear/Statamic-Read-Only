<?php
class Fieldtype_readonly extends Fieldtype
{
	public function render()
	{
		$data = $this->field_data;

		// Associative array - ie. a grid or bison order options
		if (isset($data[0]) && is_array($data[0])) {

			if (isset($this->field_config['fields'])) {
				$field_names = $this->field_config['fields'];
			}
			if (isset($this->field_config['exclude'])) {
				$exclude = $this->field_config['exclude'];
			}

			$output = '<table><thead><tr>';
			foreach ($data[0] as $key => $val) {
				if (!in_array($key, $exclude)) {
					$name = (isset($field_names[$key])) ? $field_names[$key] : ucwords(str_replace('_', ' ', $key));
					$output .= "<th>{$name}</th>";
				}
			}
			$output .= '</tr></thead><tbody>';
			foreach ($data as $row) {
				$output .= '<tr>';
				foreach ($row as $key => $val) {
					if (!in_array($key, $exclude)) {
						$output .= "<td>{$val}</td>";
					}
				}
				$output .= '</tr>';
			}
			$output .= '</tbody></table>';
			return $output;
		}

		// Regular array - ie. a simple list or bison custom_data
		elseif (is_array($data)) {

			if (isset($this->field_config['fields'])) {
				$field_names = $this->field_config['fields'];
			}

			$output = '<table>';
			foreach ($data as $key => $val) {
				$name = (isset($field_names[$key])) ? $field_names[$key] : ucwords(str_replace('_', ' ', $key));
				$output .= '<tr>';
				$output .= "<th>{$name}</th>";
				$output .= "<td>{$val}</td>";
				$output .= '</tr>';
			}
			$output .= '</table>';
			return $output;

		}

		// Simple text
		else {
			return '<div class="text">'.$data.'</div>';
		}
	}

}