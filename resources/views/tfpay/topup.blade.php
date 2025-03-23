<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, viewport-fit=cover">
    <title>Top up</title>
    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="images/logo.png" />
    <link rel="apple-touch-icon-precomposed" href="images/logo.png" />
    <!-- Font -->
    <link rel="stylesheet" href="fonts/fonts.css" />
    <!-- Icons -->
    <link rel="stylesheet" href="fonts/icons-alipay.css">
    <link rel="stylesheet" href="styles/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="styles/styles.css" />
    <link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
    <link rel="apple-touch-icon" sizes="192x192" href="app/icons/icon-192x192.png">
</head>

<body>
     <!-- preloade -->
     <div class="preload preload-container">
        <div class="preload-logo">
          <div class="spinner"></div>
        </div>
      </div>
    <!-- /preload -->
    <div class="app-header st1">
        <div class="tf-container">
            <div class="tf-topbar d-flex justify-content-center align-items-center">
               <a href="#" class="back-btn"><i class="icon-left white_color"></i></a> 
                <h3 class="white_color">Top Up</h3>
            </div>
        </div>
    </div>
    <form method="POST" action="{{route('recharger')}}">
        @csrf
        <div class="card-secton topup-content">
            <div class="tf-container">
                <div class="tf-balance-box">
                    <div class="d-flex justify-content-between align-items-center">
                        <p>Your Balance:</p>
                        <h3>{{$balance}} FDJ</h3>
                    </div>
                    <div class="tf-spacing-16"></div>
                    <div class="tf-form">
                        <div class="group-input input-field input-money">
                            <label for="">Type your voucher code</label>
                            {{-- <input type="text" value="200" required class="search-field value_input st1" type="text"> --}}
                            <input 
                                class="search-field value_input st1"
                                type="number" 
                                name="voucher" 
                                id="voucher-code" 
                                placeholder="Ex: 123456789012" 
                                maxlength="12" 
                                required 
                                pattern="[0-9]{12}">
                            <span class="icon-clear"></span>
                        </div>
                    </div>
                
                </div>
            
            </div>
            <div class="bottom-navigation-bar">
                <div class="tf-container">
                    <a href="#" id="btn-popup-up" class="tf-btn accent large">Continue</a>
                </div>
            </div>
        </div>
    
        <div class="tf-panel up">
            <div class="panel_overlay"></div>
            <div class="panel-box panel-up wrap-content-panel">
                <div class="heading">
                    <div class="tf-container">
                        <div class="d-flex align-items-center position-relative justify-content-center">
                            <i class="icon-close1 clear-panel"></i>
                            <h3>Confirm Top Up</h3>
                        </div>
                    </div>
                </div>
                <div class="main-topup">
                    <div class="tf-container">
                        <h3>Choose Source</h3>
                        <div class="tf-card-block d-flex align-items-center justify-content-between">
                            <div class="inner d-flex align-items-center">
                                <div class="logo-img">
                                    <img src="images/logo-banks/card-visa3.png" alt="image">
                                </div>
                                <div class="content">
                                <h4><a href="#" class="fw_6">Fleex Voucher</a></h4>
                                <p></p>
                                </div>
                            </div>
                            <i class="icon-right"></i>
                        </div>
                        <ul class="info">
                            <li><h4 class="secondary_color fw_4 d-flex justify-content-between align-items-center">Fee <a href="#" class="success_color fw_7">Free</a></h4></li>
                        </ul>
                        <div class="d-flex justify-content-end align-items-center">
                            <button href="31_enter-pin.html" class="tf-btn accent large"><i class="icon-secure1"></i> Recharge</button>

                        </div>
                    </div>
                    
                </div>
                
                

                
            </div>
            
        </div>
    </form>


    <script type="text/javascript" src="javascript/jquery.min.js"></script>
    <script type="text/javascript" src="javascript/bootstrap.min.js"></script>
    <script type="text/javascript" src="javascript/main.js"></script>
    
</body>

</html>