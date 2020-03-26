@extends('layouts.app')
@section('content')

<div class="container white-bg">
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
          <li><a href="#">{{App\Category::find($post->category_id)->category_name}}</a></li>
          <li class="is-active"><a href="#" aria-current="page">{{$post->post_title}}</a></li>
        </ul>
      </nav>
      <a href="{{url()->previous()}}" class="button is-link">
        <span class="icon">
            <i class="fas fa-arrow-left"></i>
        </span>
        <span>
         Back
        </span>
    </a>
    <div>&nbsp;</div>
    <div class="columns">
        <div class="column">
        <h1 class="title">{{$post->post_title}}</h1>
        <div class="is-divider"></div>
        <article class="media">

            <div class="media-content">
              <div class="content">
                <p> 
                 {{$post->post_content}}
                </p>
              </div>
              <div class="is-divider"></div>
              <nav class="level is-mobile">
                <div class="level-left">
                   <a class="level-item">
                    <span class="icon is-large"><i class="fas fa-2x fa-share"></i></span>
                  </a>
                  <a class="level-item">
                    <span class="icon is-large"><i class="fas fa-2x fa-heart"></i></span>
                  </a>
                </div>
              </nav>
            </div>

          </article>
        </div>
    </div>
</div>

@endsection