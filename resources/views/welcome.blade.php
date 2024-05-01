
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <link href="{{ asset('src/assets/libs/magnific-popup/dist/magnific-popup.css') }}" rel="stylesheet">
        <link href="{{ asset('src/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet">
        <style>
.arrow {
  border: solid black;
  border-width: 0 3px 3px 0;
  display: inline-block;
  padding: 3px;
}

.right {
  transform: rotate(-45deg);
  -webkit-transform: rotate(-45deg);
}

.left {
  transform: rotate(135deg);
  -webkit-transform: rotate(135deg);
}


            #product-container {
  display: flex;
  flex-wrap: nowrap;
  overflow-x: auto ;
  width: 100%;

}

.product {
  flex: 0 0 100%;
  padding: 10px;
}

button {
  margin-top: 10px;
}

      </style>
    </head>
    <body class="antialiased">

        <div class="preloader">
            <div class="tea lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>

        <div id="main-wrapper">

            <header class="topbar">
                <nav class="navbar top-navbar navbar-expand-lg navbar-dark">
                    <div class="navbar-header">
                        <!-- This is for the sidebar toggle which is visible on mobile only -->
                        <a class="nav-toggler waves-effect waves-light d-block d-lg-none" href="javascript:void(0)"><i
                                class="ti-menu ti-close"></i></a>

                        <a class="navbar-brand" href="index.html">
                            <!-- Logo icon -->
                            <b class="logo-icon">


                            </b>

                            <span class="logo-text">


                            </span>
                        </a>

                        <a class="topbartoggler d-block d-lg-none waves-effect waves-light" href="javascript:void(0)"
                            data-toggle="collapse" data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                                class="ti-more"></i></a>
                    </div>

                    <div class="navbar-collapse collapse" id="navbarSupportedContent">

                        <ul class="navbar-nav mr-auto float-left">

                        </ul>

                        <ul class="navbar-nav ">

                            <li class="nav-item dropdown">


                            </li>

                        </ul>
                    </div>
                </nav>
            </header>

            <aside class="left-sidebar">
                <!-- Sidebar scroll-->
                <div class="">
                    <!-- Sidebar navigation-->
                    <nav class="sidebar-nav">
                        <ul id="sidebarnav">
                            <!-- User Profile-->


                            <li class="sidebar-item"> <button id="myButton" class="btn btn-primary"
                                    aria-expanded="false"><span
                                        class="hide-menu">add Branch </span></button>

                            </li>







                        </ul>
                    </nav>

                </div>

            </aside>

            <div style="height:9.5rem"></div>


<div class="container">
                <div id="product-container" class="row">

                  </div>
</div>
<div class="d-flex justify-content-center">
    <button id="btn-backwardL" class="btn "><i class="arrow left"></i><i class="arrow left"></i></button>
    <button id="btn-backward" class="btn "><i class="arrow left"></i></button>

    <button id="btn-forward"><i class="arrow right"></i></button>
    <button id="btn-forwardL"><i class="arrow right"></i><i class="arrow right"></i></button>
</div>


<footer class="footer mb-0" style="color:black;background-color:none;">
    <p class="mb-5  w-100 text-center" style="color:black;margin-bottom:5px;margin-top:1px; font-size:12px;">
        Copyright 2024 <i class="far fa-copyright"></i> <a href="https://www.linkedin.com/in/samuel-hany/"
            target="_blank">
            <img src="{{ asset('LogoProMina.jpg') }}"
                style="
display: inline-block;
width: 20px;
margin: 0 5px;


">samuel hany</a>
        All Rights Reserved </p>
</footer>
<script>
    // console.log();
// Make an AJAX request with the CSRF token
 productContainer = document.getElementById('product-container');

function fetchdata()
{
    productContainer.innerHTML='';
    $.ajax({
        type: 'GET', //THIS NEEDS TO BE GET
        url: "{{url('/branches')}}",
        dataType: 'json',
        success: function (data) {

          loadProducts(data);


        },error:function(){
             console.log(data);
        }
    });
}


//const products =
   // console.log(typeof(products));




const btnBackward = document.getElementById('btn-backward');
const btnForward = document.getElementById('btn-forward');
const btnBackwardL = document.getElementById('btn-backwardL');
const btnForwardL = document.getElementById('btn-forwardL');
// Function to create product divs
function createProductDiv(product) {
  const div = document.createElement('div');
  div.classList.add('product');

  div.innerHTML += `
  <div class='col-md-12'>
  <form id="form`+product.id+`" class="branch-form" action="http://localhost/example-app/public/update/`+product.id+`" method="post">
    @csrf
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">English name </label>
        <div class="col-sm-9">
        <input class="form-control" type="text" name="name_en" placeholder='english name' value='`+product.name_en+`'>
   </div>
        </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">Arabic name </label>
        <div class="col-sm-9">
        <input class="form-control" type="text" name="name_ar" placeholder='arabic name' value='`+product.name_ar+`'>
   </div>
        </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">English description </label>
        <div class="col-sm-9">
        <textarea class="form-control" type="text" name="description_en" placeholder='English description'>`+product.description_en+`</textarea>

    </div>    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">Arabic description </label>
        <div class="col-sm-9">
        <textarea class="form-control" type="text" name="description_ar" placeholder='Arabic description' >`+product.description_ar+`</textarea>
    </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-3 text-right control-label col-form-label">Address </label>

        <div class="col-sm-9">
    <input class="form-control" type="text" name="address" placeholder='address'  value='`+product.address+`'>
    </div></div>
    <div class="form-group mb-0">
                        <div class="offset-sm-3 col-sm-9 d-flex justify-content-end">
                            <button type="submit" class="btn btn-info waves-effect waves-light mt-2 "
                                style="background-color:#00b9f0">update
                            </button>
                        </div>
                    </div>
    </form>
    </div>
  `;
  return div;
}
const myButton = document.getElementById('myButton');
myButton.addEventListener('click', function() {
    $.ajax({
        type: 'GET', //THIS NEEDS TO BE GET
        url: "{{url('/addBranch')}}",
        dataType: 'json',
        success: function (data) {

        fetchdata();


        },error:function(){
             console.log(data);
        }
    });


});
// Function to load products in the container
let productss = 0;
function loadProducts(products) {
   
  productContainer.innerHTML += '';
  products.forEach(product => {
    productss ++;
    const productDiv = createProductDiv(product);
    productContainer.appendChild(productDiv);
  });
}

// Function to handle backward button click
function handleBackwardClick() {
  productContainer.scrollBy(-productContainer.offsetWidth, 0);
}

// Function to handle forward button click
function handleForwardClick() {
  productContainer.scrollBy(productContainer.offsetWidth, 0);
}
function handleBackwardLClick() {
    console.log(productss);
  productContainer.scrollBy(- (productContainer.offsetWidth * productss), 0);
}

// Function to handle forward button click
function handleForwardLClick() {
  productContainer.scrollBy(productContainer.offsetWidth*productss, 0);
}
// Add event listeners to buttons
btnBackward.addEventListener('click', handleBackwardClick);
btnForward.addEventListener('click', handleForwardClick);
btnBackwardL.addEventListener('click', handleBackwardLClick);
btnForwardL.addEventListener('click', handleForwardLClick);
$( document ).ready(function() {
    fetchdata();
});
// Load products on page load

</script>
<script src="{{ asset('src/assets/libs/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{ asset('src/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('src/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- apps -->
<script src="{{ asset('dist/js/app.min.js') }}"></script>
<script src="{{ asset('dist/js/app.init.horizontal.js') }}"></script>
<script src="{{ asset('dist/js/app-style-switcher.horizontal.js') }}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{ asset('src/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
<script src="{{ asset('src/assets/extra-libs/sparkline/sparkline.js') }}"></script>
<!--Wave Effects -->
<script src="{{ asset('dist/js/waves.js') }}"></script>
<!--Menu sidebar -->
<script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>
<!--Custom JavaScript -->
<script src="{{ asset('dist/js/custom.min.js') }}"></script>
<!-- This Page JS -->
<script src="{{ asset('src/assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('src/assets/libs/magnific-popup/meg.init.js') }}"></script>

<script src="{{ asset('src/assets/libs/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('dist/js/pages/datatable/custom-datatable.js') }}"></script>
<!-- start - This is for export functionality only -->
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<script src="{{ asset('dist/js/pages/datatable/datatable-advanced.init.js') }}"></script>
<script src="{{ asset('src/assets/libs/jquery.repeater/jquery.repeater.min.js') }}"></script>
<script src="{{ asset('src/assets/extra-libs/jquery.repeater/repeater-init.js') }}"></script>
<script src="{{ asset('src/assets/extra-libs/jquery.repeater/dff.js') }}"></script>
    </body>
</html>
