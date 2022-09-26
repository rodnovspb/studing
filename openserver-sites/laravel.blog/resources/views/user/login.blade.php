<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Login Page</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <link rel="stylesheet" href="{{ asset('assets/admin/css/admin.css') }}">

  <script nonce="ad20a362-7f22-48ea-bfeb-7d2e2d309745">
    (function(w, d) {
        ! function(a, e, t, r) {
            a.zarazData = a.zarazData || {};
            a.zarazData.executed = [];
            a.zaraz = {
                deferred: [],
                listeners: []
            };
            a.zaraz.q = [];
            a.zaraz._f = function(e) {
                return function() {
                    var t = Array.prototype.slice.call(arguments);
                    a.zaraz.q.push({
                        m: e,
                        a: t
                    })
                }
            };
            for (const e of["track", "set", "debug"]) a.zaraz[e] = a.zaraz._f(e);
            a.zaraz.init = () => {
                var t = e.getElementsByTagName(r)[0],
                    z = e.createElement(r),
                    n = e.getElementsByTagName("title")[0];n && (a.zarazData.t = e.getElementsByTagName("title")[0].text);a.zarazData.x = Math.random();a.zarazData.w = a.screen.width;a.zarazData.h = a.screen.height;a.zarazData.j = a.innerHeight;a.zarazData.e = a.innerWidth;a.zarazData.l = a.location.href;a.zarazData.r = e.referrer;a.zarazData.k = a.screen.colorDepth;a.zarazData.n = e.characterSet;a.zarazData.o = (new Date).getTimezoneOffset();a.zarazData.q = [];
                for (; a.zaraz.q.length;) {
                    const e = a.zaraz.q.shift();
                    a.zarazData.q.push(e)
                }
                z.defer = !0;
                for (const e of[localStorage, sessionStorage]) Object.keys(e || {}).filter((a => a.startsWith("_zaraz_"))).forEach((t => {
                    try {
                        a.zarazData["z_" + t.slice(7)] = JSON.parse(e.getItem(t))
                    } catch {
                        a.zarazData["z_" + t.slice(7)] = e.getItem(t)
                    }
                }));z.referrerPolicy = "origin";z.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(a.zarazData)));t.parentNode.insertBefore(z, t)
            };
            ["complete", "interactive"].includes(e.readyState) ? zaraz.init() : a.addEventListener("DOMContentLoaded", zaraz.init)
        }(w, d, 0, "script");
    })(window, document);
  </script>
</head>

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <b>Логин</b>
    </div>
    <div class="card">
      <div class="card-body register-card-body">

          @if ($errors->any())
              <ul class="list-unstyled">
                 @foreach ($errors->all() as $error)
                      <li class="alert alert-danger">{{ $error }}</li>
                  @endforeach
              </ul>
          @endif

          @if(session()->has('error'))
              <div class="alert alert-danger">{{ session('error') }}</div>
          @endif


          <form action="{{ route('login') }}" method="post">
            @csrf
          <div class="input-group mb-3">
            <input name="email" type="email" class="form-control" placeholder="Почта">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input  name="password" type="password" class="form-control" placeholder="Пароль">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-4 offset-8">
              <button type="submit" class="btn btn-primary btn-block">Вход</button>
            </div>
          </div>
        </form>

      </div>

    </div>
  </div>

  <script src="{{ asset('assets/admin/js/admin.js') }}"></script>
</body>

</html>
