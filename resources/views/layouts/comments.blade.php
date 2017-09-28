<div class="detailBox">
    <div class="titleBox">
        <label>
            Comments
        </label>
        <button aria-hidden="true" class="close" id="comment-button" type="button">
            x
        </button>
    </div>
    <div class="commentBox">
        <p class="taskDescription">
            You can leave a comment for the post in the area below:
        </p>
        @if($post->comments->count() == 0)
        <div class="commentBox">
            <p class="taskDescription">
                No comments
            </p>
        </div>
        @endif
    </div>
    <div class="actionBox">
        <ul class="commentList">
            @foreach ($post->comments as $comment)
            <li>
                <div class="commenterImage">
                    <img src="http://placekitten.com/50/50"/>
                </div>
                <div class="commentText">
                    <p class="">
                        {{$comment->body}}
                    </p>
                    <span class="date sub-text">
                        {{$comment->created_at->diffForHumans()}} by {{$comment->user->name}}
                    </span>
                </div>
            </li>
            @endforeach
        </ul>
        <form action="/posts/{{$post->id}}/comments" method="POST" role="form">
            <div class="form-group">
                <input class="form-control" name="body" placeholder="Your comments" required="" type="text"/>
            </div>
            <div class="form-group">
                <button class="btn btn-default">
                    Add
                </button>
            </div>
            <input name="_token" type="hidden" value="{{csrf_token()}}">
            </input>
        </form>
        @include('layouts.errors')
    </div>
</div>
<script type="text/javascript">
    var counter = 0;
    $(document).ready(function(){

        $('#comment-button').click(function(){
          if(counter%2 === 0){
            $( ".detailBox" ).children().hide(); 
            $( ".titleBox" ).show();
          }
          else{
            $( ".detailBox" ).children().show(); 
          }
           counter++;
        });
        
    });
</script>