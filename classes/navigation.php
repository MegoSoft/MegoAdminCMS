<?
class Navigation
{
	public function returnContent()
	{
		global $db;

		$return=$this->selectCurrentSubpageData($_SESSION["lang"]."_content");
		return $return;
	}

	private function subpageHasModel()
	{
		//$
	}

	private function selectCurrentSubpageData($colName)
	{
		global $db;

		$param=str_replace("param=", "", $_SERVER["QUERY_STRING"]);
		$sel="SELECT ".$colName." FROM ".TABLE_PREFIX."nav WHERE ".$_SESSION["lang"]."_name_seo='".mysqli_real_escape_string($db,$param)."'";
		$query=$db->query($sel);
		if($query->num_rows==1)
		{
			$row=$query->fetch_object();
			return $row->$colName;
		}
		else
			return FALSE;
	}
}
?>