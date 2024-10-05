>
  <style>
    body {
      padding-bottom: 30px;
      position: relative;
      min-height: 100%;
    }
    a {
      transition: background 0.2s, color 0.2s;
    }
    a:hover,
    a:focus {
      text-decoration: none;
    }
    #wrapper {
      padding-left: 0;
      transition: all 0.5s ease;
      position: relative;
    }
    #sidebar-wrapper {
      z-index: 1000;
      position: fixed;
      left: 250px;
      width: 0;
      height: 100%;
      margin-left: -250px;
      overflow-y: auto;
      overflow-x: hidden;
      background: #222;
      transition: all 0.5s ease;
    }
    #wrapper.toggled #sidebar-wrapper {
      width: 250px;
    }
    .sidebar-brand {
      position: absolute;
      top: 0;
      width: 250px;
      text-align: center;
      padding: 20px 0;
    }
    .sidebar-brand h2 {
      margin: 0;
      font-weight: 600;
      font-size: 24px;
      color: #fff;
    }
    .sidebar-nav {
      position: absolute;
      top: 75px;
      width: 250px;
      margin: 0;
      padding: 0;
      list-style: none;
    }
    .sidebar-nav > li {
      text-indent: 10px;
      line-height: 42px;
    }
    .sidebar-nav > li a {
      display: block;
      text-decoration: none;
      color: #757575;
      font-weight: 600;
      font-size: 18px;
    }
    .sidebar-nav > li > a:hover,
    .sidebar-nav > li.active > a {
      text-decoration: none;
      color: #fff;
      background: #F8BE12;
    }
    .sidebar-nav > li > a i.fa {
      font-size: 24px;
      width: 60px;
    }
    #navbar-wrapper {
      width: 100%;
      position: absolute;
      z-index: 2;
    }
    #wrapper.toggled #navbar-wrapper {
      position: absolute;
      margin-right: -250px;
    }
    #navbar-wrapper .navbar {
      border-width: 0 0 0 0;
      background-color: #eee;
      font-size: 24px;
      margin-bottom: 0;
      border-radius: 0;
    }
    #navbar-wrapper .navbar a {
      color: #757575;
    }
    #navbar-wrapper .navbar a:hover {
      color: #F8BE12;
    }
    #content-wrapper {
      width: 100%;
      position: absolute;
      padding: 15px;
      top: 100px;
    }
    #wrapper.toggled #content-wrapper {
      position: absolute;
      margin-right: -250px;
    }
    @media (min-width: 992px) {
      #wrapper {
        padding-left: 250px;
      }
      #wrapper.toggled {
        padding-left: 60px;
      }
      #sidebar-wrapper {
        width: 250px;
      }
      #wrapper.toggled #sidebar-wrapper {
        width: 60px;
      }
      #wrapper.toggled #navbar-wrapper {
        position: absolute;
        margin-right: -190px;
      }
      #wrapper.toggled #content-wrapper {
        position: absolute;
        margin-right: -190px;
      }
      #navbar-wrapper {
        position: relative;
      }
      #wrapper.toggled {
        padding-left: 60px;
      }
      #content-wrapper {
        position: relative;
        top: 0;
      }
      #wrapper.toggled #navbar-wrapper,
      #wrapper.toggled #content-wrapper {
        position: relative;
        margin-right: 60px;
      }
    }
    @media (min-width: 768px) and (max-width: 991px) {
      #wrapper {
        padding-left: 60px;
      }
      #sidebar-wrapper {
        width: 60px;
      }
      #wrapper.toggled #navbar-wrapper {
        position: absolute;
        margin-right: -250px;
      }
      #wrapper.toggled #content-wrapper {
        position: absolute;
        margin-right: -250px;
      }
      #navbar-wrapper {
        position: relative;
      }
      #wrapper.toggled {
        padding-left: 250px;
      }
      #content-wrapper {
        position: relative;
        top: 0;
      }
      #wrapper.toggled #navbar-wrapper,
      #wrapper.toggled #content-wrapper {
        position: relative;
        margin-right: 250px;
      }
    }
    @media (max-width: 767px) {
      #wrapper {
        padding-left: 0;
      }
      #sidebar-wrapper {
        width: 0;
      }
      #wrapper.toggled #sidebar-wrapper {
        width: 250px;
      }
      #wrapper.toggled #navbar-wrapper {
        position: absolute;
        margin-right: -250px;
      }
      #wrapper.toggled #content-wrapper {
        position: absolute;
        margin-right: -250px;
      }
      #navbar-wrapper {
        position: relative;
      }
      #wrapper.toggled {
        padding-left: 250px;
      }
      #content-wrapper {
        position: relative;
        top: 0;
      }
      #wrapper.toggled #navbar-wrapper,
      #wrapper.toggled #content-wrapper {
        position: relative;
        margin-right: 250px;
      }
    }
  </style>
</head>
<body>

<div id="wrapper" class="toggled">

  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <h2>Logo</h2>
    </div>
    <ul class="sidebar-nav">
      <li>
        <a href="dashboard.php"><i class="fa fa-home"></i> Dashboard</a>
      </li>
      <li>
        <a href="app_status.php"><i class="fa fa-check-square-o"></i> Application Status</a>
      </li>
      <li>
        <a href="reg_status.php"><i class="fa fa-list-ol"></i> Registered Organisations</a>
      </li>
      <li>
        <a href="backups.php"><i class="fa fa-file-archive-o"></i> Backups</a>
      </li>
      <li class="active">
        <a href="org_type_setup.php"><i class="fa fa-sliders"></i> Organisation Types Settings</a>
      </li>
    </ul>
  </aside>

  <div id="navbar-wrapper">
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a href="#" class="navbar-brand" id="sidebar-toggle"><i class="fa fa-bars"></i></a>
        </div>
      </div>
    </nav>
  </div>

</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Bootstrap JS (optional, assuming you use Bootstrap) -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- Custom JavaScript -->
<script>
  const $button = document.querySelector('#sidebar-toggle');
  const $wrapper = document.querySelector('#wrapper');

  $button.addEventListener('click', (e) => {
    e.preventDefault();
    $wrapper.classList.toggle('toggled');
  });
</script>

