@extends('layouts.app')

@section('content')
<script src="https://cdn.auth0.com/js/auth0/9.0.0/auth0.min.js"></script>
<script type="text/javascript">
    var webAuth = new auth0.WebAuth({
        domain: 'unicodeveloper.auth0.com',
        clientID: 'PATkFym2gZQS3lEIUCS68qrSl8jgVD7P'
    });

    function signin() {
        webAuth.authorize({
            responseType: "code",
            redirectUri: 'http://laravel-auth0.dev/auth0/callback'
        });
    }
</script>
<button onclick="window.signin();">Login</button>
<!-- <div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-success">
                <div class="panel-heading">List of Game of Thrones Characters</div>

                    @if(Auth::check())

                      <table class="table">
                          <tr>
                              <th>Character</th>
                              <th>Real Name</th>
                          </tr>
                          @foreach($characters as $key => $value)
                            <tr>
                              <td>{{ $key }}</td><td>{{ $value }}</td>
                            </tr>
                          @endforeach
                      </table>
                    @endif


            </div>
            @if(Auth::guest())
              <a href="/login" class="btn btn-info"> You need to login to see the list 😜😜 >></a>
            @endif
        </div>
    </div>
</div> -->
@endsection
