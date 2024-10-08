<?php
namespace F3;

if (!defined('__ROOT__')) {
	define('__ROOT__', dirname(dirname(__FILE__)));
}
require_once (__ROOT__ . '/service/ReportService.php');
require_once (__ROOT__ . '/util/DateUtil.php');
require_once (__ROOT__ . '/util/Util.php');

use F3\Service\ReportService;
use F3\Util\DateUtil;
use F3\Util\Util;

?>

<!DOCTYPE html>
<html lang="en">

<? include __ROOT__ . '/include/head.php'; ?>

<body>
	<? include __ROOT__ . '/include/analytics.php'; ?>
	<? include __ROOT__ . '/include/nav.php'; ?>

	<?
	$reportService = new ReportService();
	$startDate = DateUtil::getDefaultDateSubtractInterval($_REQUEST['startDate'] ?? NULL, 'P1M');
	$endDate = DateUtil::getDefaultDate($_REQUEST['endDate'] ?? NULL);
	$order = $_REQUEST['order'] ?? NULL;

	$attendance = $reportService->getAttendanceCounts($startDate, $endDate, $order);
	?>

	<div class="container-fluid">
		<div class="row">
			<div class="col col-sm-3 mt-2">
				<form method="get" action="attendance.php">
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
			<div class="col col-sm-8">
				<table id="attendance" class="table table-striped table-hover">
					<thead>
						<tr>
							<th>Name</th>
							<th>Workouts</th>
							<th># Qs</th>
							<th>Q Ratio</th>
						</tr>
					</thead>
					<tbody>
						<?
						foreach ($attendance as $stat) {
							?>
							<tr>
								<td><a href="/member/detail.php?id=<?= $stat->getMemberId() ?>"><?= $stat->getMemberName() ?></a></td>
								<td><?= $stat->getNumWorkouts() ?></td>
								<td><?= $stat->getNumQs() ?></td>
								<td><?= $stat->getQRatio() * 100 ?>%</td>
							</tr>
							<?
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
		</div>
	</div>

	<script src="/js/jquery-3.7.1/jquery-3.7.1.min.js"></script>
	<script src="/js/bootstrap-5.3.3/bootstrap.bundle.min.js"></script>
	<script src="/js/f3.report.attendance.js?v=<?= Util::getVersion() ?>"></script>
	<script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script>
	<script src="https://cdn.datatables.net/2.1.3/js/dataTables.bootstrap5.js"></script>
</body>

</html>