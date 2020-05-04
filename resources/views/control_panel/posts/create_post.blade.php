@extends('layouts.app')
@section('content')

<div class="container white-bg">
  <nav class="breadcrumb" aria-label="breadcrumbs">
    <ul>
      <li><a href="/control">Control panel</a></li>
      <li><a href="/control/posts" aria-current="page">Posts</a></li>
      <li class="is-active"><a href="#" aria-current="page">Add post</a></li>
    </ul>
  </nav>
        
        <!--кнопка назад-->
        <a href="{{url()->previous()}}" class="button is-link">
                <span class="icon">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span>
                 Back
                </span>
          </a>

            <h1 class="title has-text-centered">Add Post</h1>
            <div class="is-divider"></div>

            <form id="post_form" action="control/create_new_post" enctype="multipart/form-data" method="POST">
              @csrf
              <!--категория-->
              <div class="field">
                <label class="label">Category</label>
                <div class="control">
                  <div class="select">
                    <select name="category" id="post_category">
                      @foreach($categories as $categ)
                    <option value="{{$categ->id}}">{{$categ->category_name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>


                <div class="field">
                    <div class="control">
                      <!--название поста-->
                      <p class="help">Title</p>
                      <input maxlength="35" id="post_title" class="input @error('post_title') is-danger @enderror" type="text" name="post_title" 
                      placeholder="Post title" value="@if($errors->any()){{old('post_title')}}@else @endif">
                    </div>
                    @error('post_title')
                            <p class="help is-danger"><b> {{ $message }}</b></p>  
                    @enderror
                  </div>

                  <!--textarea, содержимое поста-->
                  <p class="help">Content</p>
                    <textarea class="textarea" id="post_content" maxlength="700" name="post_content" placeholder="Write your post here"></textarea>
                    @error('post_content')
                      <p class="help is-danger"><b> {{ $message }}</b></p>
                    @enderror

                  <!--чекбокс, опубликовать сейчас-->
                  <div class="field">
                    <input class="is-checkradio is-link" name="publish" id="publish_checkbox" type="checkbox" checked="checked">
                    <label for="publish_checkbox">Publish now</label>
                    <span class="has-tooltip-multiline" data-tooltip="If checked, the post will be published immediately, otherwise you have to pick at the picked date">  <i class="fas fa-question-circle"></i> </span>
                  
                  </div>
                  <!--дата публикации-->
                  <div class="field">
                    <p class="help">Publish date</p>
                    <p class="control has-icons-left">
                       
                      <input class="input" type="date" name="publish_date" min="{{date('Y-m-d', strtotime($current_date))}}" id="publish_date" placeholder="Date" value={{$current_date}} disabled>
                      <span class="icon is-small is-left">
                        <i class="fas fa-calendar"></i>
                      </span>
                    </p>
                   
                  </div>
                  <!--теги-->
                  <div class="field">
                    <div class="control">
                        <p class="help">Tags</p>
                      <input class="input" type="text" id="tags" name="tags" placeholder="video,post,meme,text,whatever">
                    </div>
                    
                  </div>     
            </form>
    
            <!--форма для загрузки файлов-->
            <form action="/post/upload_files" class="dropzone" id="file_form">
              @csrf
              <div class="fallback">
                <input name="file" type="file" multiple />
              </div>
            </form>
            <!--кнопка отправки формы-->
            <a id="submit_post" class="button is-info">
              <span class="icon">
                <i class="fas fa-save"></i>
              </span>
              <span>Save Post</span>
            </a>
     
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/jquery.richtext.min.js') }}"></script>
<script src="{{ asset('js/jquery.caret.min.js') }}"></script>
<script src="{{ asset('js/jquery.tag-editor.min.js') }}"></script>
<script src="{{ asset('js/custom/shared/char_counter.js') }}"></script>
<script src="http://malsup.github.com/jquery.form.js"></script>
<script src="{{ asset('js/dropzone.js') }}"></script>
<script src="{{ asset('js/custom/control_panel/create_post.js') }}"></script>
@endpush