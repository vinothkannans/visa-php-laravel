<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>@yield('title') - {{ getEnv('APP_NAME')}}</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/vinkas/visa.css" />
</head>
<body class="visa">
  <header id="header">
    <div class="container">
      <div class="row">
        <div class="col-xs-3">
          <h1 class="logo"><img src="/images/logo.png" /></h1>
        </div>
        <div class="col-xs-9 text-right">
          @yield('header-right')
        </div>
      </div>
    </div>
  </header>
  <div class="container">
    <div class="page-header text-center">
      <h1 class="h2">@yield('title')</h1>
    </div>
  </div>
  @yield('content')
  <script src="https://www.gstatic.com/firebasejs/3.2.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/3.2.0/firebase-auth.js"></script>
  <script>
  var config = {
    apiKey: "{{ getEnv('FIREBASE_API_KEY')}}",
    authDomain: "{{ getEnv('FIREBASE_AUTH_DOMAIN')}}",
  };
  firebase.initializeApp(config);
  function google() {
    var provider = new firebase.auth.GoogleAuthProvider();
    firebase.auth().signInWithRedirect(provider);
  }
  firebase.auth().getRedirectResult().then(function(result) {
    if (result.credential) {
      var token = result.credential.accessToken;
    }
    var user = result.user;
    alert(user.displayName);
  }).catch(function(error) {
    var errorCode = error.code;
    var errorMessage = error.message;
    var email = error.email;
    var credential = error.credential;
  });
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>
