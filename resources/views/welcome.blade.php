<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
            <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
                <meta content="" name="description">
                    <meta content="" name="author">
                        <link href="../../favicon.ico" rel="icon">
                            <title>
                                Blog for PHP developers
                            </title>
                            {{-- JQuery  --}}
                            <script src="https://code.jquery.com/jquery-2.1.3.min.js">
                            </script>
                            {{--
                            <script src="/js/jquery.typeahead.min.js">
                            </script>
                            --}}
                            <script src="/js/typeahead.bundle.js">
                            </script>
                            {{--
                            <script src="/js/typeahead.min.js">
                            </script>
                            --}}
                            <link href="/css/typeahead.user.css" rel="stylesheet">
                                <!-- Bootstrap core CSS -->
                                <link crossorigin="anonymous" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" rel="stylesheet">
                                    {{--
                                    <link crossorigin="anonymous" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" rel="stylesheet">
                                        --}}
                                        <script crossorigin="anonymous" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
                                        </script>
                                        <!-- Custom styles for this template -->
                                        {{--
                                        <link href="/css/jquery.typeahead.min.css" rel="stylesheet">
                                            --}}
                                            <link href="/css/comments.css" rel="stylesheet">
                                                <link href="/css/blog.css" rel="stylesheet">
                                                </link>
                                            </link>
                                        </link>
                                    </link>
                                </link>
                            </link>
                        </link>
                    </meta>
                </meta>
            </meta>
        </meta>
    </head>
    <body>
        @include('layouts.header')

      @include('sessions.flashMessage')
     
    @include('layouts.title')
        <div class="container">
            <div class="row">
                <div class="col-sm-8 blog-main">
                    @yield('blogcontent')
                </div>
                <!-- /.blog-main -->
                <div class="col-sm-3 offset-sm-1 blog-sidebar">
                    @include('sidebars.sidebar1')
          @include('sidebars.sidebar2')
          @include('sidebars.sidebar3')
                </div>
                <!-- /.blog-sidebar -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
        @include('layouts.footer')
        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        {{--
        <script crossorigin="anonymous" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" src="https://code.jquery.com/jquery-3.1.1.slim.min.js">
        </script>
        --}}
    {{--
        <script>
            window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')
        </script>
        --}}
        <script crossorigin="anonymous" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js">
        </script>
        {{--
        <script crossorigin="anonymous" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
        </script>
        --}}
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="/js/ie10-viewport-bug-workaround.js">
        </script>
    </body>
</html>
