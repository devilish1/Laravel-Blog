         <div class="sidebar-module">
            <h4>Tags</h4>
            <ol class="list-unstyled">
              	@foreach($tags as $tag)
              		<li><a href="/tags/{{$tag}}">{{$tag}}</a></li>
            	@endforeach
            </ol>
          </div>
