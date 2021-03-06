@extends('layouts.app')
@section('title', 'Edit a category'." -")
@section('content')
<div class="container white-bg">
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
          <li><a href="/control">Control panel</a></li>
          <li><a href="/control/categories" aria-current="page">Categories</a></li>
          <li class="is-active"><a href="/control/categories" aria-current="page">Edit category</a></li>
          <li class="is-active"><a href="/control/categories" aria-current="page">{{$categ->category_name}}</a></li>
        </ul>
    </nav>

    <div class="is-divider"></div>

    <div class="columns">
        <div class="column">
        <form action="/control/categories/edit/{{$categ->id}}" method="POST" id="category_form">
                @csrf

                <div class="field">
                    <label class="label">Category name</label>
                    <div class="control">
                      <input maxlength="50" class="input @error('category_name') is-danger @enderror"
                       name="category_name" id="title" type="text" placeholder="Category name"
                       value="@if($errors->any()){{old('category_name')}}@else{{$categ->category_name}}@endif">
                    </div>
                    @error('category_name')
                    <p class="help is-danger"><b> {{ $message }}</b></p>  
                   @enderror
                  </div>

                  <div class="control">
                    <button class="button is-link @if(config('isMobile')) is-fullwidth @endif" id="save_category">
                      <span class="icon is-small">
                        <i class="fas fa-save"></i>
                      </span>
                      <span>Save changes</span>
                    </button>
                  </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/custom/shared/char_counter.js') }}"></script>
<script src="{{ asset('js/custom/control_panel/create_category.js') }}"></script>
@endpush