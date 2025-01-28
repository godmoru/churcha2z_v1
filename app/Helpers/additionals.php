<?php 

function SystemLog($action_group, $action, $comment, $ip){
	$log = new \App\ActivityLog;
	$log->user_id = \Auth::user()->id;
	$log->location_id = \Auth::user()->location_id;
	$log->action_group = "$action_group";
	$log->action = $action;
	$log->remote_address = $ip;
	$log->comment = $comment;
	$log->status = 1;
	$log->save();
}

function getTotals($field)
{
	$total =  \App\AccountReconciliation::where('month_in_view', date('m'))->sum($field);

	return number_format($total);
}

function hqRemitancePaid()
{
	$check = \App\HQRemitance::where('month',date('m'))->first();
	if (is_null($check)) {
		return false;
	}
	return true;
}