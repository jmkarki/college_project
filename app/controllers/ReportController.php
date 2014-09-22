<?php
class ReportController extends BaseController{
	public function getIndex(){
		return View::make('report.report');
	}
}
?>