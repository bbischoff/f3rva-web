<?php
namespace F3;

if (!defined('__ROOT__')) {
	define('__ROOT__', dirname(dirname(__FILE__)));
}
require_once(__ROOT__ . '/service/ReportService.php');
require_once(__ROOT__ . '/util/DateUtil.php');

use F3\Service\ReportService;
use F3\Util\DateUtil;
?>

<!DOCTYPE html>
<html lang="en">

<? include __ROOT__ . '/include/head.php';?>

<body>
<? include __ROOT__ . '/include/analytics.php'; ?>
<? include __ROOT__ . '/include/nav.php';?>

<?
	$reportService = new ReportService();
	$startDate = DateUtil::getDefaultDateSubtractInterval($_REQUEST['startDate'] ?? NULL, 'P1M');
	$endDate = DateUtil::getDefaultDate($_REQUEST['endDate'] ?? NULL);
	
	$aoAverages = $reportService->getAverageAttendanceByAO($startDate, $endDate);
?>

<div class="container-fluid">
	<div class="row">
		<div class="col col-sm-3 mt-2">
			<form method="get" action="ao.php">
				<div class="mt-2">
					<label class="col-md-4 col-form-label" for="startDate">Start</label>
					<div class="col-md-8">
						<input type="date" name="startDate" class="form-control" id="startDate" value="<?= $startDate ?>">
					</div>
				</div>
				<div class="mb-2">
					<label class="col-md-4 col-form-label" for="endDate">End</label>
					<div class="col-md-8">
						<input type="date" name="endDate" class="form-control" id="endDate" value="<?= $endDate ?>">
					</div>
				</div>
				<button type="submit" class="btn btn-secondary">Filter</button>
			</form>
		</div>
		<div class="col col-sm-3 mt-3">
			<table id="ao" class="table table-striped">
			<thead>
				<tr>
					<th>AO</th>
					<th>Average Attendance</th>
				</tr>
			</thead>
			<?	
				foreach ($aoAverages as $ao) {
			?>
				<tr>
					<td><a href="/ao/detail.php?id=<?= $ao->getId() ?>"><?= $ao->getDescription() ?></a></td>
					<td><?= $ao->getValue() ?></td>
				</tr>
			<?
				}
			?>
			</table>
		</div>
	</div>
	<div class="row">
	</div>
</div>

<script src="/js/jquery-3.7.1/jquery-3.7.1.min.js"></script>
<script src="/js/bootstrap-5.3.3/bootstrap.bundle.min.js"></script>
	
</body>
</html>

