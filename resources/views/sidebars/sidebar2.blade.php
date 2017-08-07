          <div class="sidebar-module">
            <h4>Archives</h4>
            <ol class="list-unstyled">
            
            @foreach($archives as $archive)
              <li><a href="/?month={{$archive['month']}}&year={{$archive['year']}}">{{$archive['year']}} {{$archive['month']}}</a></li>
            @endforeach
            </ol>
          </div>
