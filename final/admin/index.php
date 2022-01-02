<?php
include 'api/connect.php';

if (!isset($_SESSION['nrp']) || $_SESSION['nrp'] == "") {
  header("Location: login.php");
}

$nrp = $_SESSION['nrp'];

$sql = "SELECT * FROM panitia WHERE nrp = '" . $nrp . "'";

$query = mysqli_query($con, $sql);

$data = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard LKMM-TM 2022</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
    <!-- Favicons -->
    <link rel="shortcut icon" href="asset/Logo/favicon.png" type="image/x-icon">
    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    @keyframes chartjs-render-animation {
        from {
            opacity: .99
        }

        to {
            opacity: 1
        }
    }

    .chartjs-render-monitor {
        animation: chartjs-render-animation 1ms
    }

    .chartjs-size-monitor,
    .chartjs-size-monitor-expand,
    .chartjs-size-monitor-shrink {
        position: absolute;
        direction: ltr;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        overflow: hidden;
        pointer-events: none;
        visibility: hidden;
        z-index: -1
    }

    .chartjs-size-monitor-expand>div {
        position: absolute;
        width: 1000000px;
        height: 1000000px;
        left: 0;
        top: 0
    }

    .chartjs-size-monitor-shrink>div {
        position: absolute;
        width: 200%;
        height: 200%;
        left: 0;
        top: 0
    }
    </style>
</head>

<body data-new-gr-c-s-check-loaded="14.986.0" data-gr-ext-installed="">
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <p class="navbar-brand col-md-3 col-lg-2 me-0 px-3 mb-0" href="index.php">LKMM-TM 2022
        </p>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </header>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-home">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                </svg>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="setInterview.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-calendar">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                </svg>
                                Set Interview Schedule
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="dataNewComittee.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-file">
                                    <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                                    <polyline points="13 2 13 9 20 9"></polyline>
                                </svg>
                                Committee Candidate Data
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="interviewSchedule.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-users">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                </svg>
                                Interview Schedule
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                <a class="nav-link" href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                  Reports
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                  Integrations
                </a>
              </li> -->
                    </ul>
                    <div class="container mt-5 mb-3">
                        <div class="row">
                            <div class="col p-0">
                                <a href="api/logout.php" class="btn btn-danger btn-sm m-0"
                                    style="font-size: .8rem;">Logout</a>
                            </div>
                        </div>
                    </div>
                    <hr>

                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                    </div>
                </div>
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <p>Hello <?php echo $data['nama'] ?></p>
                            <p>Aliasmu adalah <span id="aliasku"><?php echo $data['alias'] ?></span></p>
                            <p>Saat ini, kamu ada <?php echo $data['status'] ?> wawancara</p>
                            <p>Berikut link wawancaramu : <span id="meetku"><a href="<?php echo $data['meet'] ?>"> <?php echo $data['meet'] ?></span> </p>
			    <p>Berikut Link untuk Pertanyaan Wawancara : <a href="https://petra.id/InterviewITEM2021">Link</a></p>
			    
                        </div>
                        <div class="form-group col mb-3">
                            <label for="alias">Ganti Alias</label>
                            <input type="text" name="alias" id="alias" placeholder="Alias....">
                            <button class="btn btn-success" onclick="ganti_alias()">Ganti</button>
                        </div>

                        <div class="form-group col mb-3">
                            <label for="meet">Ganti Link Meet</label>
                            <input type="text" name="meet" id="meet" placeholder="Meet....">
                            <button class="btn btn-success" onclick="ganti_meet()">Ganti</button>
                        </div>

                       

                    </div>
                    <div class=row>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Divisi</th>
                                    <th scope="col">Link Meet</th>
                                    <th scope="col">Alias</th>
                                </tr>
                            </thead>
                            <tbody id="aliastable">
                            </tbody>
                </table>
                    </div>
                </div>
            </main>
        </div>
    </div>



    <script src="js/bootstrap.bundle.min.js.download"></script>
    <script src="js/feather.min.js.download"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/app.js"></script>
</body>

</html>