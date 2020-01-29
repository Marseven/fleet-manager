<!DOCTYPE html>
<html lang="fr">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>

	<title><?php echo e(Hyvikk::get('app_name')); ?></title>
	<!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js does not work if you view the page via file:// -->
	<!--[if lt IE 11]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Mebodo Richard Aristide" />
	<script>
	    (function(h,o,t,j,a,r){
	        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
	        h._hjSettings={hjid:1629434,hjsv:6};
	        a=o.getElementsByTagName('head')[0];
	        r=o.createElement('script');r.async=1;
	        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
	        a.appendChild(r);
	    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
	</script>
	<!-- Favicon icon -->
	<link rel="icon" href="<?php echo e(asset('assets/images/ico.png')); ?>" type="image/x-icon">

	<!-- vendor css -->
	<link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
	
	


</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content">
		<div class="card">
			<div class="row align-items-center text-center">
				<div class="col-md-12">
					<div class="card-body">
            <img src="<?php echo e(asset('assets/images/logo-dark.png')); ?>" alt="" class="img-fluid mb-4">
            <?php if(session('status')): ?>
              <div class="alert alert-success">
                  <?php echo e(session('status')); ?>

              </div>
            <?php endif; ?>
            <h4 class="mb-3 f-w-400">Mot de Passe Oublié</h4>
            <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('password.email')); ?>">
              <?php echo e(csrf_field()); ?>

              <div class="form-group mb-3 <?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                <label class="floating-label" for="Email">Email</label>
                <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo e(old('email')); ?>" id="email" autofocus required>
                <?php if($errors->has('email')): ?>
                  <span class="help-block">
                      <strong class="text-danger"><?php echo e($errors->first('email')); ?></strong>
                  </span>
                <?php endif; ?>
              </div>
              
            
              <button type="submit" class="btn btn-block btn-primary mb-4">Envoyer</button>
              <p class="mb-2 text-muted">Vous avez un compte ? <a href="<?php echo e(route('login')); ?>" class="f-w-400">Connexion</a></p>
            </form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="<?php echo e(asset('assets/js/vendor-all.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/plugins/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/ripple.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/pcoded.min.js')); ?>"></script>



</body>
</html>
<?php /**PATH /Applications/MAMP/htdocs/fleet-manager-git/framework/resources/views/auth/passwords/email.blade.php ENDPATH**/ ?>