<article class="media comment" id="comment_anchor_{{$comment->id}}">
    <div class="media-content">
        <div class="content">
            <div class="is-4">
                @if($comment->deleted == 0)
                    @if(config('isMobile') == true)
                        <strong>{{Str::limit($comment->username,14,'...')}}</strong>
                    @else
                        <strong>{{$comment->username}}</strong>
                    @endif
                    @if($comment->is_logged_on == 1)
                    <span data-tooltip="This is a registered user">
                        <i class="fas fa-check"></i>
                    </span>
                        
                    @else

                    @endif
                @else
                    <strong><i>[deleted]</i></strong>
                @endif

                <i class="comment-date">| {{date('d.m.Y', strtotime($comment->date))}}</i>

                @if(config('isMobile') != true)
                    @if($comment->deleted == 0)
                        @if($comment->reply_to != null)
                        <a href="#comment_anchor_{{$comment->reply_to}}" class="a_reply_tag"> A reply to {{$comment->reply_user}}</a>
                        @endif
                    @endif
                @endif
                @if($comment->deleted == 0)
                    <a href="#reply_p" class="action-reply-button" data-tooltip="Reply to this comment" data-id={{$comment->id}} data-user={{$comment->username}}>
                        <span class="icon has-text-link">
                            <i class="fas fa-reply"></i>
                        </span>
                    </a>
                @endif
                @if(config('isMobile') != true)
                    @if($is_admin == true)
                        <form action="/post/change_comment_status" method="POST" style="display:inline">
                            @csrf
                            <input type="text" class="invisible"  name="comment_id" value="{{$comment->id}}">
                            @php
                            $val = "";
                            $txt = "";
                            $icon = "";
                            $color ="";

                            if($comment->visibility == 1)
                            {
                                $val = "hide";
                                $txt = "Hide";
                                $icon = "fas fa-eye-slash";
                                $color = "has-text-danger";
                            }
                            else
                            {
                                $val = "show";
                                $txt = "Show";
                                $icon = "fas fa-eye";
                                $color = "has-text-success";
                            }
                            @endphp
                            <input type="text" class="invisible "name="action" value="{{$val}}">
                            <button type="submit" class="action-button" data-tooltip="{{$txt}} this comment">
                                <span class="icon {{$color}}">
                                    <i class="{{$icon}}"></i>
                                </span>
                            </button>
                        </form>
                         
                        @if($comment->deleted == 0)
                            <form action="/post/change_comment_status" method="POST" style="display:inline">
                                @csrf
                                <input type="text" class="invisible"  name="comment_id" value="{{$comment->id}}">
                                <input type="text" class="invisible "name="action" value="delete">
                                    <button type="submit" class="action-button" data-tooltip="Delete this comment">
                                        <span class="icon has-text-dark">
                                            <i class="fas fa-ban"></i>
                                        </span>
                                    </button> 
                                </div>
                            </form>
                        @else
                            <form action="/post/change_comment_status" method="POST" style="display:inline">
                                @csrf
                                <input type="text" class="invisible"  name="comment_id" value="{{$comment->id}}">
                                <input type="text" class="invisible "name="action" value="restore">
                                    <button type="submit" class="action-button" data-tooltip="Restore this comment">
                                        <span class="icon has-text-dark">
                                            <i class="fas fa-check"></i>
                                        </span>
                                    </button> 
                                </div>
                            </form>
                        @endif

                    @endif  
                @endif
            </div>
            <br>
            <div class="content p_fix">
                @if($comment->deleted == 0)
                    {!!$comment->comment_content!!}
                @else
                    <i>[deleted]</i>
                @endif
            </div>

            <div>
                @if(config('isMobile') == true)
                    @if($comment->reply_to != null)
                        <a href="#comment_anchor_{{$comment->reply_to}}" class="a_reply_tag"> A reply to {{$comment->reply_user}}</a>
                    @endif
                    @if(config('isMobile') == true)
                    @if($is_admin == true)
                        <form action="/post/change_comment_status" method="POST" style="display:inline">
                            @csrf
                            <input type="text" class="invisible"  name="comment_id" value="{{$comment->id}}">
                            @php
                            $val = "";
                            $txt = "";
                            $icon = "";
                            $color ="";

                            if($comment->visibility == 1)
                            {
                                $val = "hide";
                                $txt = "Hide";
                                $icon = "fas fa-ban";
                                $color = "has-text-danger";
                            }
                            else{
                                $val = "show";
                                $txt = "Show";
                                $icon = "fas fa-check";
                                $color = "has-text-success";
                            }
                            @endphp
                            <input type="text" class="invisible "name="action" value="{{$val}}">
                            <button type="submit" class="action-button" data-tooltip="{{$txt}} this comment">
                                <span class="icon {{$color}}">
                                    <i class="{{$icon}}"></i>
                                </span>
                            </button>
                        </form>

                        <form action="/post/change_comment_status" method="POST" style="display:inline">
                            @csrf
                            <input type="text" class="invisible"  name="comment_id" value="{{$comment->id}}">
                            <input type="text" class="invisible "name="action" value="delete">
                                <button type="submit" class="action-button" data-tooltip="Delete this comment">
                                    <span class="icon has-text-dark">
                                        <i class="fas fa-trash"></i>
                                    </span>
                                </button> 
                            </div>
                        </form>
                    @endif  
                @endif
                 @endif
            </div>
    </div>
</article>