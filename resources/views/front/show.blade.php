<div class="col-md-8">
    <article class="post">
        <div class="post-thumb">
            <a href="{{route('article.show', $article->slug)}}"><img src="{{$article->getImage()}}" alt="">
        </div>
        <div class="post-content">
            <header class="entry-header text-center text-uppercase">
                @if($article->hasCategory())
                    <h6><a href="{{route('category.show', $article->category->slug)}}"> {{$article->getCategoryTitle()}}</a></h6>
                @endif
                <h1 class="entry-title"><a href="{{route('article.show', $article->slug)}}">{{$article->title}}</a></h1>
            </header>
            <div class="entry-content">
                {!! $article->content !!}
            </div>
            <div class="decoration">
                @foreach($article->tags as $tag)
                    <a href="{{route('tag.show', $tag->slug)}}" class="btn btn-default">{{$tag->title}}</a>
                @endforeach
            </div>

            <div class="social-share">
                <span class="social-share-title pull-left text-capitalize">By {{$article->author->name}} On {{$article->getDate()}}</span>
                <ul class="text-center pull-right">
                    <li><a class="s-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a class="s-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a class="s-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a class="s-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a class="s-instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </article>
    <div class="row"><!--blog next previous-->
        <div class="col-md-6">
            @if($article->hasPrevious())
                <div class="single-blog-box">
                    <a href="{{route('article.show', $article->getPrevious()->slug)}}">
                        <img src="{{$article->getPrevious()->getImage()}}" alt="">

                        <div class="overlay">

                            <div class="promo-text">
                                <p><i class=" pull-left fa fa-angle-left"></i></p>
                                <h5>{{$article->getPrevious()->title}}</h5>
                            </div>
                        </div>

                    </a>
                </div>
            @endif
        </div>
        <div class="col-md-6">
            @if($article->hasNext())
                <div class="single-blog-box">
                    <a href="{{route('article.show', $article->getNext()->slug)}}">
                        <img src="{{$article->getNext()->getImage()}}" alt="">

                        <div class="overlay">
                            <div class="promo-text">
                                <p><i class=" pull-right fa fa-angle-right"></i></p>
                                <h5>{{$article->getNext()->title}}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @endif
        </div>
    </div><!--blog next previous end-->
    <div class="related-post-carousel"><!--related post carousel-->
        <div class="related-heading">
            <h4>You might also like</h4>
        </div>
        <div class="items">
            @foreach($article->related() as $item)
                <div class="single-item">
                    <a href="{{route('article.show', $item->slug)}}">
                        <img src="{{$item->getImage()}}" alt="">

                        <p>{{$item->title}}</p>
                    </a>
                </div>
            @endforeach
        </div>
    </div><!--related post carousel-->
        @if(!$article->comments->isEmpty())
            @foreach($article->getComments() as $comment)
                <div class="bottom-comment"><!--bottom comment-->
                    <div class="comment-img">
                        <img class="img-circle" src="{{$comment->author->getImage()}}" alt="" width="75" height="75">
                    </div>

                    <div class="comment-text">
                        <h5>{{$comment->author->name}}</h5>

                        <p class="comment-date">
                            {{$comment->created_at->diffForHumans()}}
                        </p>

                        <p class="para">{{$comment->text}}</p>
                    </div>
                </div>
            @endforeach
        @endif
    <!-- end bottom comment-->
        @if(Auth::check())
            <div class="leave-comment"><!--leave comment-->
                <h4>Leave a reply</h4>
                <form class="form-horizontal contact-form" role="form" method="post" action="/comment">
                    {{csrf_field()}}
                    <input type="hidden" name="article_id" value="{{$article->id}}">
                    <div class="form-group">
                        <div class="col-md-12">
                            <textarea class="form-control" rows="6" name="message" placeholder="Write Massage"></textarea>
                        </div>
                    </div>
                    <button class="btn send-btn">Post Comment</button>
                </form>
            </div><!--end leave comment-->
        @endif
</div>