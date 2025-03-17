<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, viewport-fit=cover">
    <title>Unsuccessful</title>
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
    
    <div class="wrap-success">
        
            
            <div class="success_box">
                <div class="content">
                        <div class="top">
                            <h2>We're sorry!</h2>
                            <p class="fw_4">We couldn't proceed your recharge !</p>
                        </div>
                        <div class="bottom">
                            <p>{{session('message')}}</p>
                        </div>
                        
                </div>
                <a href="{{route('topup')}}" class="tf-btn accent large">Retry</a>
                
            </div>

            <span class="line-through through-1"></span>
            <span class="line-through through-2"></span>
            <span class="line-through through-3"></span>
            <span class="line-through through-4"></span>
            <span class="line-through through-5"></span>
            <span class="line-through through-6"></span>

    </div>


    <script type="text/javascript" src="javascript/jquery.min.js"></script>
    <script type="text/javascript" src="javascript/bootstrap.min.js"></script>
    <script type="text/javascript" src="javascript/main.js"></script>
    <script type="text/javascript" src="javascript/init.js"></script>
</body>

</html>