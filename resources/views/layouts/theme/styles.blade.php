
<link href="assets/css/loader.css" rel="stylesheet" type="text/css" />
<script src="assets/js/loader.js"></script>
 <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
 <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
 <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
 <link href="assets/css/structure.css" rel="stylesheet" type="text/css" class="structure" />



<link rel="stylesheet" href="{{asset('assets/css/elements/avatar.css')}}" type="text/css"/>

<link rel="stylesheet" href="{{asset('plugins/sweetalerts/sweetalert.css')}}" type="text/css"/>
<link rel="stylesheet" href="{{asset('plugins/notification/snackbar/snackbar.min.css')}}" type="text/css"/>

<link rel="stylesheet" href="{{asset('css/custom.css')}}" type="text/css" />

<link rel="stylesheet" href="{{asset('assets/css/widgets/modules-widgets.css')}}" type="text/css" />
<link rel="stylesheet" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}" type="text/css" />


<style>
    aside{
        display: none !important;
    }
    .page-item.active .page-link{
        z-index: 3;
        color: #fff;
        background-color: #3b3f5c;
        border-color: #3b3f5c;
    }
    @media (max-width: 480px)
    {
        .mtmobile{
            margin-bottom: 20px !important;
        }
        .mbmobile{
            margin-bottom: 10px !important;
        }
        .hideonsm{
            display: none !important;
        }
        .inblock{
            display: block;
        }
    }
    /*Sidebar Background*/
    .sidebar-theme #compactSidebar {
      background: #191e3a !important;
    }
    /*Sidebar collapse background*/
    .header-container .sidebarCollapse {
        color: #3b3f5c!important;
    }
    .navbar .navbar-item .nav-item form.form-inline input.search-form-control {
        font-size: 15px;
        background-color: #3b3f5c !important;
        padding-right: 40px;
        padding-top: 12px;
        border: none;
        color: #fff;
        box-shadow: none;
        border-radius: 30px;
    }
</style>

@livewireStyles
