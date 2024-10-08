<?php
namespace F3;

if (!defined('__ROOT__')) {
	define('__ROOT__', dirname(__FILE__));
}
require_once(__ROOT__ . '/util/Util.php');

use F3\Util\Util;
?>

<nav class="navbar navbar-dark bg-dark navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">
      <img src="/assets/F3RVAlogo_v1_white.svg" alt="F3RVA" height="15px">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Reports
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/report/attendance.php">Attendance</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/report/ao.php">AO</a></li>
            <li><a class="dropdown-item" href="/report/dayOfWeek.php">Day of Week</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Self Service
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/self-service/alias.php">Claim Alias</a></li>
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <? if (Util::isLoggedIn()) { ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Admin
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/admin/aliasRequests.php">Alias Requests</a></li>
              <li><a class="dropdown-item" href="/admin/managePax.php">Manage Pax</a></li>
            </ul>
          </li>
        <? } ?>
        <li class="nav-item">
          <? if (Util::isLoggedIn()) { ?>
            <a class="nav-link" href="/logout.php">Logout</a>
          <? } else { ?>
            <a class="nav-link" href="/login.php">Login</a>
          <? } ?>
        </li>
      </ul>
    </div>
  </div>
</nav>
